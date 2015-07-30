<?php

// IO:
/**
 * Initialize the file handles of data.
 * @param array $handles
 * @param array $paths
 */
function init(&$handles, $paths){
    foreach ($paths as $path) {
        $handles[] = fopen($path, 'r');
    }
}

/**
 * Close all data handles.
 * @param array $handles
 */
function goFumer($handles){
    foreach($handles as $handle) {
        fclose($handle);
    }
}

// UI:
/**
 * Print a statistics line in a HTML table.
 * @param string $header
 * @param int $c
 */
function printLine($header, $c) {
    echo "<tr>";
    echo "<td>" . $header . "</td>";
    echo "<td>" . $c . "</td>";
    echo "</tr>";
}

// Utils:
/**
 * Clean the input string by removing all "full-corner" characters in chinese.
 * @param string $school
 */
function clean(&$school){
    $school = str_replace("（", '(', $school);
    $school = str_replace("）", ')', $school);
    $school = str_replace(' ', '', $school);
    $school = preg_replace("/\([^)]*\)/", "", $school);
}

/**
 * Check if an input school name is matched with a 211 school.
 * @param string $school
 * @param array $schools211
 * @return bool
 */
function is211($school, $schools211){
    foreach ($schools211 as $school211) {
        if ($school == $school211) return true;
    }
    return false;
}
