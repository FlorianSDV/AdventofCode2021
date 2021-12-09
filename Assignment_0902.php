<?php
$cavernArray = explode(PHP_EOL, file_get_contents('Assignment_0901_input'));
for ($i = 0; $i < count($cavernArray); $i++) {
    $cavernArray[$i] = str_split($cavernArray[$i]);
}
