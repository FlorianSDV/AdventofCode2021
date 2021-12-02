<?php
$explodedTextFile = explode(PHP_EOL, file_get_contents('Assignment_0201_input'));
$horizontal = 0;
$depth = 0;
foreach ($explodedTextFile as $command){
    $commandArray = explode(" ", $command);
    switch ($commandArray[0]){
        case "up":
            $depth = $depth - $commandArray[1];
            break;
        case "down":
            $depth = $depth + $commandArray[1];
            break;
        case "forward":
            $horizontal = $horizontal + $commandArray[1];
            break;
    }
}
echo $horizontal * $depth;