<?php
   
    $sarasas = json_decode(file_get_contents(__DIR__ . '/data.json', 1));
    //sortas
    usort($sarasas, function($a, $b) {return strcmp($a->pavarde, $b->pavarde);});
    file_put_contents(__DIR__ . '/data.json', json_encode($sarasas));
    $sarasas = json_decode(file_get_contents(__DIR__ . '/data.json', 1));


 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php' ?>   
    <?php foreach($sarasas as $indexas => $value): ?>
        <div style="background:red; margin: 50px">
    <?php foreach($value as $index => $name): ?>
    
        <li><?= $name ?></li>
         
    <?php endforeach ?>
        <a href="http://localhost/11pamoka/bankas/pridetiLesas.php?index=<?= $indexas ?>">Pridėti</a>
        <a href="http://localhost/11pamoka/bankas/nuskaitytiLesas.php?index=<?= $indexas ?>">Atimti</a>
        <a href="http://localhost/11pamoka/bankas/istrintiSaskaita.php?index=<?= $indexas ?>">Istrinti saskaita</a>
    </div>
    <?php endforeach ?>

 
</body>
</html>

