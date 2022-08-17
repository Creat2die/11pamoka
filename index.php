<h1>1. Kintamieji ir sąlygos</h1>
<?php
echo "----1--- <br>";

$name = 'Jevgenij';
$surname = 'Safarevič';
$birthDate = 1994;
$todayDate = 2022;
$age = $todayDate - $birthDate;
echo "Aš esu $name $surname. Man yra $age <br>";
echo "----2--- <br>";
$pirmasSkaicius = rand(0, 4);
$antrasSkaicius = rand(0, 4);
if($pirmasSkaicius > $antrasSkaicius){
    echo "didesnis skaičius $pirmasSkaicius";
}else{
    echo "didesnis skaičius $antrasSkaicius";
};
echo "<br>----3--- <br>";
$sk31 = rand(0, 25);
$sk32 = rand(0, 25);
$sk33 = rand(0, 25);

if($sk31 > $sk32 && $sk32 ){
    echo "didesnis skaičius $sk31";
} else if($sk32 > $sk31 && $sk32 ) {
    echo "didesnis skaičius $sk32";
}else {
    echo "didesnis skaičius $sk33";
}
echo "<br>----4--- <br>";
$sk41 = rand(1, 10);
$sk42 = rand(1, 10);
$sk43 = rand(1, 10);
if($sk41 < $sk42 + $sk43 && $sk42 < $sk41 + $sk43  && $sk43 < $sk42 + $sk41){
    echo 'galimas trikampis';
}else {
    echo 'trikampis negalimas';
};
echo "<br>----5--- <br>";
$sk51 = rand(0,2);
$sk52 = rand(0,2);
$sk53 = rand(0,2);
$sk54 = rand(0,2);

$sum50 =0;
$sum51 =0;
$sum52 =0;
if ($sk51 === 0){
    $sum50++;
} else if ($sk51 === 1){
    $sum51++;
} else{
    $sum52++;
};

if ($sk52 === 0){
    $sum50++;
} else if ($sk52 === 1){
    $sum51++;
} else{
    $sum52++;
};
if ($sk51 === 0){
    $sum50++;
} else if ($sk52 === 1){
    $sum51++;
} else{
    $sum52++;
};
if ($sk53 === 0){
    $sum50++;
} else if ($sk53 === 1){
    $sum51++;
} else{
    $sum52++;
};
if ($sk54 === 0){
    $sum50++;
} else if ($sk54 === 1){
    $sum51++;
} else{
    $sum52++;
};

echo "$sum50 -- $sum51 --- $sum52 ";

echo "<br>----6--- <br>";
$sk61=rand(1,6);
echo "<h$sk61>$sk61</h$sk61>";

echo "<br>----7--- <br>";
$sk71 = rand(-10,10);
$sk72 = rand(-10,10);
$sk73 = rand(-10,10);

if($sk71 < 0){
    echo "<p style='color:green'>$sk71</p> ";
}else{
    echo "<p style='color:red'>$sk71</p> ";
};
if($sk72 < 0){
    echo "<p style='color:green'>$sk72</p> ";
}else{
    echo "<p style='color:red'>$sk72</p> ";
};
if($sk73 < 0){
    echo "<p style='color:green'>$sk73</p> ";
}else{
    echo "<p style='color:red'>$sk73</p> ";
};

echo "<br>----8--- <br>";
$sk81 = rand(5,5000);
$kaina8 =0;
if ($sk81<1000){
    $kaina8=$sk81;
}else if($sk81 > 2000){
    $kaina8 = $sk81 * 0.96;
};
echo "Užperkame : $sk81 , kaina bus: $kaina8 Eurai";

echo "<br>----9--- <br>";
$sk91= rand(0, 100);
$sk92= rand(0, 100);
$sk93= rand(0, 100);

$vid91 = ($sk91 +$sk92 +$sk93)/3;
$sum9 = 0;
$dal9 = 0;
if($sk91 > 10 && $sk91<90){
    $sum9 += $sk91;
    $dal9 ++;
}
if($sk92 > 10 && $sk92<90){
    $sum9 += $sk92;
    $dal9 ++;
}
if($sk93 > 10 && $sk93<90){
    $sum9 += $sk93;
    $dal9 ++;
}
$vid92 = ($sum9)/3;

echo "vidurkis paprastas: $vid91; vidurkis apvalintas $vid92";

echo "<br>----10--- <br>";
$valanda=rand(0,23);
$minute=rand(0,59);
$sekunde=rand(0,59);

$papildomas = rand(0, 300);

$hour =0;
$minut =0;
$second =0;

echo "$valanda   $minute   $sekunde<br>";
echo "$papildomas<br>";

 $sekunde += $papildomas;
if($sekunde < 10){
    $second = sprintf("%02d", $sekunde);
} else if($sekunde > 59){
    while ($sekunde > 59){
        $minute +=1;
        $sekunde -=60;       
    }
    if($sekunde < 10){
        $second = sprintf("%02d", $sekunde);
    }else {
        $second=$sekunde;
    }
} else {
    $second=$sekunde;
}

if($minute < 10){
    $minut = sprintf("%02d", $minut);
} else if($minute > 59){
    while ($minute > 59){
        $minute +=1;
        $minute -=60;
    }
    if($minute < 10){
        $minut = sprintf("%02d", $minut);
    } else {
        $minut = $minute;
    }
} else {
    $minut = $minute;
}

if($valanda < 10){
    $hour = sprintf("%02d", $valanda);
} else {
    $hour = $valanda;
}

echo "<br>$hour : $minut : $second";