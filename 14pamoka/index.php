<?php

echo '<pre>';
$mas =['balta', 9 =>'juoda', 'raudona'];
$mas['Super'] = 'Super Katė';
$mas[] ='kate';
$mas[7] = 'suo';
$mas[0] = 'Dramblys';
$mas[] = 'Katė';


print_r($mas);

foreach(range(0,4) as $val){
    echo "Dabar: $val";
}

// $colors = ['red', 'green', 'blue', 'yellow'];

// foreach($colors as $index => $value){
//     echo 'Indeksas: ' . $index . ' Reikšmė: ' . $value . '<br>';
// }


// foreach($colors as &$value){}

// //unset($value);

// foreach($colors as $value){}

print_r($colors);

$colors = [['red', 'green', 'blue', 'yellow'],
 ['dramblys', 'bebras', 'briedis', 'barsukas', 'elnias'],
  [77, 12]];

  echo $colors[1][0];

  foreach($colors as $stalcius){
    foreach($stalcius as $daiktas){
        echo "$daiktas\n";  
    }
  }
$mass = [];
 $count = 0;

  for($i =0; $i<3; $i++){
    $mas = [];
    for($m =0; $m<3; $m++){
        $mas[]= ++$count;
    }
    $mass[] = $mas;
  }

  print_r($mass);


  echo '<br>---1---<br>';
  $mas=[];
  for ($i=0 ; $i<30; $i++){
    $mas[$i] =rand(5,25);
  }
  print_r($mas);

  echo '<br>---2a---<br>';
  $sum=0;
  foreach($mas as $number){
    if($number > 10){
      $sum++;
    }
  }
  echo $sum;

  echo '<br>---2b---<br>';
  //pasiklausti..........
  $max = max($mas);
  $result = array_filter($mas,function($v)use($max){ return $v == $max;});
  print_r($result);

  echo '<br>---2c---<br>';
  $sum =0;
  foreach($mas as $index => $value){
    if($index %2 ===0){
      $sum++;
    }
  }
  echo $sum;

  echo '<br>---2d---<br>';
  $mas2=[];
  foreach($mas as $index => $value){
    $mas2[]= $value-$index;
  }
  print_r($mas2);
  echo '<br>---2e---<br>';
  for($i=0; $i<10; $i++){
    $mas[]= rand(5,25);
  }
  print_r($mas);

  echo '<br>---2f---<br>';
  $sum =0;
  $maspor=[];
  $masnepor=[];
  foreach($mas as $index => $value){
    if($index %2 ===0){
      $maspor[$index]= $value;
    }else{
      $masnepor[$index]= $value;
    }
  }
  print_r($maspor);
  echo '<br>porinis ir neporinis<br>';
  print_r($masnepor);

  echo '<br>---2g---<br>';

  foreach($mas as $index => $value){
    if($index %2 ===0){
      if($value>15){
        $mas[$index]=0;
      }
    }
  }

  print_r($mas);

  echo '<br>---2h---<br>';

    foreach($mas as $index => $value){
      if($value > 10){
        echo $index;
        break;
      }
    }
    echo '<br>---2i---<br>';
    foreach($mas as $index => $value){
      if($index %2 ===0){
        unset($mas[$index]);
      }
    }
    print_r($mas);
    echo '<br>---3---<br>';
    $abcd=['A', 'B', 'C', 'D'];
    $array=[];
    $A=0;
    $B=0;
    $C=0;
    $D=0;
    for ($i=0; $i<200; $i++){
      $array[]=$abcd[rand(0,3)];
      if($array[$i]=== 'A'){
        $A++;
      }
      if($array[$i]=== 'B'){
        $B++;
      }
      if($array[$i]=== 'C'){
        $C++;
      }
      if($array[$i]=== 'D'){
        $D++;
      }
    }
    print_r($array);
    echo " a= $A ; b= $B ; c= $C ; d= $D";

    echo '<br>---4---<br>';

    sort($array);
    print_r($array);
    echo '<br>---5---<br>';

    $abcd=['A', 'B', 'C', 'D'];
    $array1=[];
    $array2=[];
    $array3=[];
    $array4=[];
    for ($i=0; $i<200; $i++){
      $array1[]=$abcd[rand(0,3)];
      $array2[]=$abcd[rand(0,3)];
      $array3[]=$abcd[rand(0,3)];
      $array4[]= $array1[$i] .$array2[$i] .$array3[$i];
    }
    print_r($array4);

    $result = array_unique($array4);

    print_r(count($result));
    $kiekis =0;
    $result2 = array_count_values($array4);

    foreach($result2 as $value){
      if($value === 1){
        $kiekis++;
      }
    }
    echo "<br>$kiekis";