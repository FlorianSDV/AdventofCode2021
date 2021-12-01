<?php
$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0101_input'));
$count = 0;
for ($i = 1; $i < count($explodedTextFile); $i++) {
    if ($explodedTextFile[$i] > $explodedTextFile[$i - 1]) {
        $count++;
    }
}
echo $count;