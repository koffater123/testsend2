<?php

$file = fopen("http://110.78.128.10/c.csv","r");
$i=1;
while(! feof($file))
  {
	$line[$i] = fgetcsv($file);
	$i++;
  }
//while (($line = fgetcsv($file)) !== FALSE) {
fclose($file);
print_r($line[1]);

//print_r($i);
?>