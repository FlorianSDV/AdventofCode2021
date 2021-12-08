<?php
function writeTable($array)
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
$firstImport = explode(PHP_EOL, file_get_contents("Assignment_0801_input"));
for ($i = 0; $i < count($firstImport); $i++) {
    $firstImport[$i] = explode(" ", $firstImport[$i]);
}
//writeTable($firstImport);
$tellertje = 0;
foreach ($firstImport as $line){
    foreach ((array)$line as $number) {
        if (strlen($number) == 2 || strlen($number) == 4 || strlen($number) == 3 || strlen($number) == 7){
            $tellertje++;
        }
    }
}
//echo $tellertje;
echo strlen($firstImport[0][3]);
writeTable($firstImport);
