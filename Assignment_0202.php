<?php
$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0201_input'));
$horizontal = 0;
$depth = 0;
$aim = 0;
foreach ($explodedTextFile as $command) {
    $commandArray = explode(" ", $command);
    switch ($commandArray[0]) {
        case "up":
            $aim = $aim - $commandArray[1];
            break;
        case "down":
            $aim = $aim + $commandArray[1];
            break;
        case "forward":
            $horizontal = $horizontal + $commandArray[1];
            $depth = $depth + $aim * $commandArray[1];
            break;
    }
}
echo $horizontal * $depth;