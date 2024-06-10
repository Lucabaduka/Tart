<?php

/*
*
* Tart: Universal Endorsement Aid
* Copyright 2024 Luca McGrath, MIT License
* https://github.com/Lucabaduka/Tart
*
*/

/* This file collects and processes the NationStates data dump into a json file for Tart to use */

#######################################
# ---   V    Configuration   V    --- #
#######################################

// This should be the operator's main NationStates nation or email address.
$agent = "Default";

#######################################
# --- Do not edit below this line --- #
#######################################

// Cleans up any old data dumps
// Called before and after processing
// Returns nothing, just like life
function cleanUp() {

  // Find and vanquish any file that isn't the Tart data file
  $files = glob(dirname(__DIR__, 1) . "/Sources/Record/*");
  foreach($files as $file) {
    if (is_file($file) && basename($file) !== "tart.json") {
      unlink($file);
    }
  }

}

// Acquires and unzips a nation data dump
// Called just before processing the dump
// Returns a path to the XML file
function aquisition() {

  // Make sure the space is clear
  cleanup();

  // Get set up for our end
  global $agent;
  $url = "https://www.nationstates.net/pages/nations.xml.gz";
  $name = dirname(__DIR__, 1) . "/Sources/Record/nations.xml.gz";
  $archive = str_replace(".gz", "", $name);

  // Get set for their end
  if ($agent === "Default") die("You must set a user-agent to proceed.");
  $options  = array("http" => array("User-Agent" => "$agent, Running Tart v2.0.3"));
  $context  = stream_context_create($options);

  // Pull the dump
  file_put_contents($name, file_get_contents($url, false, $context));

  // Prepare to extract
  $chunk_size = 4096;
  $file = gzopen($name, "rb");
  $out_file = fopen($archive, "wb");

  // Extract
  while (!gzeof($file)) {
    fwrite($out_file, gzread($file, $chunk_size));
  }

  // Close files
  fclose($out_file);
  gzclose($file);

  // Return path of new XML file
  return $archive;

}

// Processes the data dump and turns it into Tart's json data
// Principle function, expected to be called through a user's cron job
// Returns a json data file of regions with WA nations with their endorsements & the delegate
function main() {

  /* Our structure looks like this

  "Refugia": {
    "delegate": "Typica",
    "nations": [
      {
      "Refuge Isle": [
        "sylh_alanor",
        "typica"
        ]
      }
    ]
  }

  */

  // Get that them there data dump
  $dump = aquisition();

  // Initialise our array
  $tart = array();
  $loaded = false;

  // Begin iterating through the dump
  $xml = XMLReader::open(dirname(__DIR__, 1) . "/Sources/Record/nations.xml");
  while ($xml->read()) {

    // Load values for each nation
    $loaded = false;
    switch ($xml->name) {
      case "NAME":
        $name = $xml->readInnerXML() ?? null;
        $xml->next();
        break;
      case "UNSTATUS":
        $status = $xml->readInnerXML() ?? null;
        $xml->next();
        break;
      case "ENDORSEMENTS":
        $endos = $xml->readInnerXML() ?? null;
        $xml->next();
        break;
      case "REGION":
        $region = $xml->readInnerXML() ?? null;
        $loaded = true;
        $xml->next();
        break;
    }

    // We assume we have some data at this point
    if ($loaded) {

      // However, we only want to process data for WA members
      if ($status === "WA Member" || $status === "WA Delegate") {

        // If the key isn't in the array, we need to add it
        if (!array_key_exists($region, $tart)) {
          $tart[$region] = array(
            "delegate" => null,
            "nations" => array()
          );
        }

        // If it does exist, we need to add *to* it
        $tart[$region]["nations"][$name] = explode(",", $endos);

        // Set the delegate, if we found a delegate
        if ($status === "WA Delegate") $tart[$region]["delegate"] = $name;
      }

      // Finally, clear our variables so could never post old data
      [$name, $status, $endos, $region] = "";
      $loaded = false;
    }

  }

  // Now that we have our super array, we can dump it to json and take a nap
  $json = json_encode($tart);

  // Determine the save location and put it there
  $save_name = dirname(__DIR__, 1) . "/Sources/Record/tart.json";
  file_put_contents($save_name, $json);

  // Clean up again
  cleanup();

}

main();

?>