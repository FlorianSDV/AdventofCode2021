<?php

function writeTable($array) {

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
$array = [$array = 312, 401, 15, 401, 3, ""];
writeTable($array);
$array = array_diff($array, [] );
writeTable($array);
