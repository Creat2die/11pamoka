<?php

require __DIR__ . '/Nso.php';
require __DIR__ . '/Tv.php';

echo '<pre>';

// $nso1 = new Nso;
// $nso2 = new Nso;
// $nso3 = new Nso;

$samsung = new Tv('Silver', '40"');
$lg = new Tv('Black', '90"');
$silelis = new Tv('Yellow', '400"');


// var_dump($lg);
// var_dump($nso1);


// $lg->color = 'black';

echo $samsung->color;
echo "\n";
echo $lg->color;
echo "\n";
echo $silelis->color;
echo "\n";
echo $silelis->showColor();
echo "\n";

$samsung->show();

$lg->size;