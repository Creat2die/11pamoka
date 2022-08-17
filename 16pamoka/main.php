<?php 


echo '<pre>';

echo "start \n";

//$data = require __DIR__ . '\d.php';


// $data = file_get_contents(__DIR__ . '\labas.txt');

//  $x =['labas' => 'pats tulabas'];

//  $j = json_encode($x);

// echo $j;

// file_put_contents(__DIR__ . '\x.json', $j);

$j = json_decode (file_get_contents(__DIR__ . '\x.json', $j), 1);
print_r($j);

// print_r($data);

// @require __DIR__ . '\inc.php';
// require __DIR__ . '\inc.php';
// require __DIR__ . '\..\15pamoka\kitas.php';




echo "\n end\n";