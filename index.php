<?php

require_once('functions.php');

header('Content-Type: text/html; charset=UTF-8');

$headers = array(
    "一营",
    "三营",
    "四营",
    "六营一班",
    "六营二班",
    "六营三班",
    "六营四班",
    "六营五班",
    "五营",
    "核燃料公司",
);

$paths = array(
    'res/data_camp1.csv',
    'res/data_camp3.csv',
    'res/data_camp4.csv',
    'res/data_camp6_1.csv',
    'res/data_camp6_2.csv',
    'res/data_camp6_3.csv',
    'res/data_camp6_4.csv',
    'res/data_camp6_5.csv',
    'res/data_camp5.csv',
    'res/data_campNU.csv',
);

$handles = array();

init($handles, $paths);
$handle211 = fopen('res/211.csv', 'r');
$a211 = fgetcsv($handle211);

echo "<table border=\"1\">";
echo "<thead><tr><th>营</th><th>计</th></tr></thead>";
echo "<tbody>";

$cAll = 0;
foreach ($handles as $key => $handle) {
    $data = fgetcsv($handle);
    $c = 0;
    foreach ($data as $schoolName) {
        clean($schoolName);
        if (is211($schoolName, $a211)) {
            $c++;
        }
    }
    printline($headers[$key], $c);

    $cAll += $c;
}
printline("总计", $cAll);

echo "</tbody>";
echo "</table>";

fclose($handle211);
goFumer($handles);
