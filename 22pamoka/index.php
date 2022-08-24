<?php
echo '<pre>';

require __DIR__ . '/Tv.php';
require __DIR__ . '/Kibiras.php';
require __DIR__ . '/SuperKibiras.php';





// $tv1 = New Tv(55);

// print_r($tv1->showList());

// var_dump($tv1);


// $stu1 =  Kibiras::naujasKibiras();
// $stu2 =  unserialize(serialize($stu1));
$stu1 =  new SuperKibiras;
$stu2 =  new SuperKibiras;


$stu2->prideti1Akmeni();
$stu2->prideti2Akmenis();


$stu1->prideti1Akmeni();
$stu1->prideti1Akmeni();
$stu1->prideti1Akmeni();
$stu1->pridetiDaugAkmenu(53);


echo '2: ' .$stu2->kiekPririnktaAkmenu();
echo "\n";
echo '1: ' .$stu1->kiekPririnktaAkmenu();


echo "\n";
echo 'viso:' .$stu1->kiekBendrauYraAkmenu();
echo "\n";
echo 'statine funkcija viso:' . Kibiras::kiekYraAkmenu();

