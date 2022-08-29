<?php

// require __DIR__ . '/01/Title.php';
// require __DIR__ . '/01/Read.php';
// require __DIR__ . '/02/Read.php';
 require __DIR__ . '/vendor/Autoload.php';


// spl_autoload_register(function($class){
//     echo $class .' 1<br>';
// });

// spl_autoload_register(function($class){
//     echo $class .' 2<br>';
// });

// spl_autoload_register(function($class){
//     echo $class .' 3<br>';
// });

//namespaceinam
$b1 = new Petro\Read;
$b2 = new Antano\Belekas\Read;



echo $b1->funBook();
echo '<br>';
echo $b2->sadBook();