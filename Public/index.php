<?php

/*
*
* Tart: Universal Endorsement Aid
* Copyright 2024 Luca McGrath, MIT License
* https://github.com/Lucabaduka/Tart
*
*/

$version = "2.0.0";
require_once("../Sources/gears.php");

// These variables are almost universal, so make sure we always have them
$time = new TimeLord(filemtime("../Sources/Record/tart.json"));
$nation = $_GET["nation"] ?? null;
$region = $_GET["region"] ?? null;

// We appear to be receiving some kind of message
if ($nation !== null && $region !== null) {

  // Prepare the message for the datafile search
  $nation = cleanName($nation);
  $region = cleanName($region);

  // Bring up the data file
  $file = file_get_contents("../Sources/Record/tart.json");
  $df = json_decode($file, true);

  // If the region exists, give a sweet output
  if (array_key_exists($region, array_change_key_case($df, CASE_LOWER))) {
    $region = getStyle($region, $df);

    // Get the nation's style if they were in the region so we can filter it later
    if (array_key_exists($nation, array_change_key_case($df[$region]["nations"], CASE_LOWER))) {
      $nation = getStyle($nation, $df[$region]["nations"]);
    }

    // Determine what the nation has and hasn't endorsed
    $endos = new Endos($nation, $df[$region]["nations"]);
    $total = count($df[$region]["nations"]);

    // If the length of missing is 0, recognise a perfect cross
    if (count($endos->missing()) === 0) {

      $title    = "Fully Crossed";
      $subtitle = "Bless this full endotart";
      $text     = "{$nation} has endorsed every World Assembly nation that was in this region as of the last database update
      at <b>{$time->stamp()}</b>.<br><br>

      This accounts for <b>{$total}</b> endorsements given and is cause for celebration! If you'd like to check back later,
      there should be a new update <b>{$time->estimate()}</b>.";

      include "../Sources/Templates/page.php";

      // else send the links
    } else {
      include "../Sources/Templates/sweet.php";
    }

    // We can't find the region
  } else {

    $title    = "No Record Found";
    $subtitle = "World Assembly nations in this region are unknown";
    $text     = "The region you entered ( <span class=\"code\"><a href=\"https://www.nationstates.net/region={$region}\">{$region}</a></span>
    ) either does not exist or no World Assembly nations lived there at the last update.<br><br>

    If you mis-typed, you can use a region's full name or paste it's URL into the region bar and try again. If the region was just founded, you have to
    wait for NationStates' Major update to pass over it, and then wait for Nightly to process that data. Assuming there are any World Assembly nations
    to provide you with, the new data will be available here <b>{estimate}</b>.";

    include "../Sources/Templates/page.php";

  }

  // Return a basic 404 if Apache asks
} elseif ($_SERVER['REQUEST_URI'] == "/404") {

  $title    = "404: Not Found";
  $subtitle = "Region is unknown or cannot be known";
  $text     = "No page that fit your request was found within the database, or whatever
               resource you were sent to retrieve here no longer exists.";

  include "../Sources/Templates/page.php";

  // Return a basic 500 if Apache asks
} elseif ($_SERVER['REQUEST_URI'] == "/500") {
  $title    = "500: Internal Server Error";
  $subtitle = "The server's brain has exploded";
  $text     = "Something about your last interaction triggered a fault in the Tart software or in the server's
               configuration. If it keeps happening, feel free to report it to Refuge administration.";

  include "../Sources/Templates/page.php";

  // Direct everyone else to the splash page
} else {
    include "../Sources/Templates/splash.php";
}

?>