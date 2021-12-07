<?php
function writeTable($array) {

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
$firstImport = explode(PHP_EOL . PHP_EOL, file_get_contents("Assignment_04_Bingo_Sheet"));

writeTable($firstImport);

//echo '<pre>';
//print_r($firstImport);
//echo '</pre>';
//
//for ($i = 0; $i < count($firstImport); $i++) {
//
//}