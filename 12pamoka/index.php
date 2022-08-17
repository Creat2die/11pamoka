
<?php

$p = ['S', 'M', 'L', 'XL'][rand(0,3)];
echo 'senukas atnešė: ' . $p;

if($p == 'S'){
    echo '<br>Tikrinam S';
}
if($p == 'S' || $p == 'M'){
    echo '<br>Tikrinam M';
}
if($p == 'S' || $p == 'M' || $p == 'L'){
    echo '<br>Tikrinam L';
}
if($p == 'XL' || $p == 'S' || $p == 'M' || $p == 'L'){
    echo '<br>Tikrinam XL';
}

echo '<br>---swich---<br>';
switch($p){
    case 'S' : echo '<br>Tikrinam S';
    case 'M' : echo '<br>Tikrinam M';
    case 'L' : echo '<br>Tikrinam L';
    case 'XL' : echo '<br>Tikrinam XL';
}


echo '<br>---1---<br>';

$name = 'Steve';
$surname = 'Jobs';

if(strlen($name) <strlen($surname)){
    echo $name;
} else {
    echo $surname;
}

echo '<br>---2---<br>';

echo strtoupper($surname);

echo '<br>---3---<br>';

$inic = substr($name, 0, 1) . substr($surname, 0, 1);
echo $inic;

echo '<br>---4---<br>';

$inic4 = substr($name, -3, 3) . substr($surname, -3, 3);
echo $inic4;

echo '<br>---5---<br>';

$text5 = 'An American in Paris';

$text51 = str_replace('a', '*', $text5);
echo str_replace('A', '*', $text51);

echo '<br>---6---<br>';

echo preg_match_all("/[A,a]/", $text5);

echo '<br>---7---<br>';

$answer7= str_ireplace(array('a','e','i','o','u',' '), '', $text5);
echo "<br>$answer7";

$text7 = "Breakfast at Tiffany's <br>";
echo "<br>$text7";
echo str_ireplace(array('a','e','i','o','u',' '), '', $text7);

echo '<br>---8---<br>';

$text8 = 'Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';

echo $text8;
echo preg_replace('/[^0-9]/', '', $text8);

echo '<br>---9---<br>';

$text9 = "Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$text91 = "Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";

$array9 = str_word_count($text9, 1, 'àáãç3');
$array91 = str_word_count($text91, 1, 'àáãç3');

foreach($array9 as $word9){
    if(strlen($word9) < 5){
        echo "<br>$word9";
    }
}
echo '<br>------<br>';
foreach($array91 as $word91){
    if(strlen($word91) < 5){
        echo "<br>$word91";
    }
}

echo '<br>---10---<br>';

$length = 3;

$randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);

echo $randomletter;