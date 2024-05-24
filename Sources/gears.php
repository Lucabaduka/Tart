<?php

/*
*
* Tart: Universal Endorsement Aid
* Copyright 2024 Luca McGrath, MIT License
* https://github.com/Lucabaduka/Tart
*
*/

/* This file contains all the functions and objects used by Tart in other areas */

// Gets the capitalisation style from an array with a case-insensitive string
// Called after receiving input from the operator
// Returns a formatted string
function getStyle($string, $array) {
  foreach ($array as $key => $value) {
      if (strtolower($string) === strtolower($key)) {
          return (string) $key;
      }
  }
  return false; // This shouldn't be possible with where we're calling it
}

// Formats a string so it's more suitable for URLs
// Called when preparing nations while serving sweet
// Returns a string in lowercase with spaces replaced with underscores
function makeWeb($string) {
  $lower = strtolower($string);
  $return = str_replace(" ", "_", $lower);
  return $return;
}

class TimeLord {
  public function __construct(public int $unix){}

  // Converts a unix int to a string of time
  // Called whenever a page displays how old the data file is
  // Returns a human-readable timestamp in PDT
  public function stamp() {
    return strftime("%b %d %Y at %H:%M, PDT", ($this->unix - (7*3600)));
  }

  // Converts a unix into to a relative estimate of time
  // Called whenever a page displays when we think the next data dump will roll in
  // Returns a string estimating the database update in plain English
  public function estimate() {

    $remaining = (($this->unix - (7*3600)) - time());
    if ($remaining > 3600) {
      $num = $ramining/3600;
      $estimate = "in about $num hours";
    } elseif ($remaining < 3600 && $remaining > 60) {
      $num = $remaining/60;
      $estimate = "in about $num minutes";
    } else {
      $estimate = "any minute now";
    }
    return $estimate;
  }
}

// Removes illegal characters and transforms to lower case
// Called after receiving input from the operator
// Returns a clean string
function cleanName($string) {
  $string = str_replace("https://www.nationstates.net/nation=", "", $string);
  $string = str_replace("https://www.nationstates.net/region=", "", $string);
  $string = str_replace("_", " ", $string);
  return strtolower(preg_replace("/[^a-z A-Z 0-9-_]/", "", $string));
}

class Endos {
  public function __construct(public string $nation, public array $region_profile){}

  // Prepares data for other functions
  // Called by Endos->links() and Endos->missing()
  // Returns a list of WA members, excluding the nation, which the nation hasn't endorsed
  protected function main() {
      $links = "";
      foreach ($this->region_profile as $key => $value) {

          if ($key !== $this->nation && !in_array(makeWeb($this->nation), $value) ) {
              $links .= $key . ",";
          }
      }
      return substr_replace($links, '', -1);
  }

  // Prepares a string of missing nations for the auto-feeder js
  // Called when serving sweet
  // Returns a string of url-safe nation names, separated by commas
  public function links() {
      return makeWeb($this->main());
  }

  // Prepares a list of nations to make button-links with in sweet
  // Called when serving sweet
  // Returns an array of nations
  public function missing() {
      return array_filter(explode(",", $this->main()));
  }
}

?>