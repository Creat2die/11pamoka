<?php
echo '<pre>';
require __DIR__ . '/Kibiras1.php';
require __DIR__ . '/Kibiras2.php';
require __DIR__ . '/Kibiras3.php';
require __DIR__ . '/Pinigine.php';
require __DIR__ . '/KibirasNePo1.php';
require __DIR__ . '/Stikline.php';
require __DIR__ . '/Grybas.php';
require __DIR__ . '/Krepsys.php';

$sum= 0;
 $kibiras1 = new Kibiras1;
 $pinigine = new Pinigine;

 $kibiras21 = new Kibiras2;
 $kibiras22 = new Kibiras2;

 $kibirasNePo1= new KibirasNePo1;

 $s200 =new Stikline(200);
 $s150 =new Stikline(150);
 $s100 =new Stikline(100);

 $k = new Krepsys;

 while($k->deti(new Grybas)){}


 $kibiras1->prideti1Akmeni();
 $kibiras1->prideti1Akmeni();
 $kibiras1->pridetiDaugAkmenu(15);

 $kibirasNePo1->prideti1Akmeni();
 $kibirasNePo1->prideti1Akmeni();
 $kibirasNePo1->pridetiDaugAkmenu(15);

 $pinigine->ideti(1);
 $pinigine->ideti(1);
 $pinigine->ideti(18);


 $kibiras22->prideti1Akmeni();
 $kibiras22->pridetiDaugAkmenu(15);
 $kibiras21->prideti1Akmeni();
 $kibiras21->pridetiDaugAkmenu(16);


$s100->ipilti($s150->ipilti( $s200->ipilti(1000)->ispilti())->ispilti());




 echo $kibiras1->kiekPririnktaAkmenu();

 echo '<br>';

echo $pinigine->skaiciuoti();
echo '<br>';

echo Kibiras2::akmenuKiekisVisuoseKibiruose();
echo '<br>';
echo 'kibiras ne po 1: ' .$kibirasNePo1->kiekPririnktaAkmenu();
echo '<br>';

var_dump($s200);
var_dump($s150);
var_dump($s100);
echo '<br>';

var_dump($k);