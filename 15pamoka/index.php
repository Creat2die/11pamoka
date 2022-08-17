<?php

echo  '<pre>';
// $mas =[];
// foreach(range(1, 30) as $_){
//     $mas[]= rand(5,25);
// }

// print_r($mas);

// $max = $mas[0];
// $indexes = [];

// foreach($mas as $index => $value){
//     if($value > $max){
//         $max =$value;
//         $indexes = [];
//         $indexes[] = $index;

//     } else if($max == $value){
//         $indexes[] = $index;
//     }
// }
// print_r($max);
// echo "\n";
// print_r($indexes);

function fun (string $s = 'bevardis', string|array $v = 'bla bla') : string{
    return "Labukas $v, $s, ką tu? \n ";    
}

$kibiras = fun('Jonai', 'Petrai');

echo ($kibiras);
echo "<br>";

function moreFun(...$kazkas){
    print_r($kazkas);
}

moreFun(2, 8, 7, 33);

$moreFun2 = function(){

    $notFun2 = function(){
        print_r('Labukas');
    };
    return $notFun2;
};

$moreFun2();
$a = $moreFun2();

$a();

echo "<br>";
//var_dump($moreFun2(2, 8, 7, 99));

// COLBACKAS

// function abc($str){
//     echo $str;
// };

// function doPrint($fun, $ka){
//     $fun($ka);
// };

// doPrint('abc', 'Grybas2');

function abc($str){
    echo $str;
};

function doPrint($fun, $ka){
    return $fun($ka);
};

// $burbulas = 'Baravykas';
// doPrint(function($str) use ($burbulas){
//     echo $str . $burbulas;
// }
// , 
// 'Grybas3');

$burbulas = 'Baravykas';
$c = doPrint(
    fn($str) => $str . $burbulas, 
'Grybas38');

echo $c;


$mas = [44, 5, 9, 11, 0, 54, 7];

//usort($mas, fn($a, $b) => $b <=> $a);
//usort($mas, fn($a, $b) => $a%2 || $b);
usort($mas, fn($a, $b) => 2 - rand(0,3));

print_r($mas);


echo '<br>---1---<br>';
/*Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;*/

function sk1 ($a) :string{
    return "<h1>$a</h1>";
}

echo sk1('Labas');

echo '<br>---2---<br>';
    /*Parašykite funkciją su dviem argumentais, 
    pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią fun */

function fun2(string $a,  int $b){
    return "<h$b>$a</h$b>";
}

echo fun2('Miau', 5);

echo '<br>---3---<br>';

/*Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()).
 Visus skaitmenis stringe įdėkite į h1 tagą. Raides palikite. Jegu iš eilės eina keli skaitmenys,
  juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio) 
  Keitimui naudokite pirmo patobulintą (jeigu reikia) uždavinio funkciją ir preg_replace_callback();
*/

echo $galinis = preg_replace_callback('/[0-9z]+/', function($a){return "<h1 style='display:inline'>$a[0]</h1>";}, md5(time()));

echo '<br>---4---<br>';
/*Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos
 (išskyrus vienetą ir patį save) Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;
*/

function fun4($a) :int{
    $g=0;
    for($i = 1; $i < $a; $i++){
        if($a%$i===0 ){
            $g++;
        }
    }
    $g -=1;
    return $g;
}

echo fun4(59);

echo '<br>---5---<br>';
/*Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77. 
Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.
*/
$mas=[];
for($i=0; $i < 100; $i++){
    $mas[]=rand(33,77);
}
usort($mas, fn($a, $b) =>  fun4($b) - fun4($a));
print_r($mas);

echo '<br>---6---<br>';
/*Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777.
 Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.
*/

$mas=[];
foreach(range(0,100) as $value){
    $mas[]= rand(333,777);
}
print_r($mas);
foreach($mas as $index => $value){
    if(fun4($value) >1){
        unset($mas[$index]);
    };
};

print_r($mas);

echo '<br>---7---<br>';
/*Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį,
 elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal
  tokią pat salygą kaip ir pirmasis masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų.
  Paskutinio masyvo paskutinis elementas yra lygus 0;
  */

  $gylis = rand(10,30);
  function fun7(int $gylis){
    $mas=[];
    static $s=0;
    while($s<$gylis){ 
       
        $s++;   
        for($i=0; $i<rand(10,20); $i++){
        $mas[]=rand(0,10);

    }
    if($s === $gylis){
        $mas[count($mas)]= 0;
     }else{
        $mas[count($mas)]= fun7($gylis);
     }

    };
      return $mas;
  }

print_r(fun7($gylis));

$lialia=fun7($gylis);
print_r($lialia);

  echo '<br>---8---<br>';
  /*Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą. Skaičiuoti reikia visuose masyvuose ir submasyvuose.
*/


function fun8(array|int $masyvas){
    $sum=0;
   if(is_int($masyvas)){
       $sum+=$masyvas;
   }else {
       foreach($masyvas as $num){
           $sum+=fun8($num);
       }

   }
   return $sum;
}

echo fun8($lialia);
