<?php
   
    $sarasas = json_decode(file_get_contents(__DIR__ . '/data.json', 1));

    usort($sarasas, function($a, $b) {return strcmp($a->pavarde, $b->pavarde);});
     file_put_contents(__DIR__ . '/data.json', json_encode($sarasas));

    //GET trinimas
  
    if(isset($_GET)){
        $indexPasirinkto = ($_GET['index']);
    }

    $sarasas = json_decode(file_get_contents(__DIR__ . '/data.json'),1);
    foreach($sarasas as $index => $value){
        if($indexPasirinkto == $index){
            if($sarasas[$index]['likutis'] == 0){
                unset($sarasas[$indexPasirinkto]);
                echo 'PASkYRA BUVO ISTINTA';
                file_put_contents(__DIR__ . '/data.json', json_encode($sarasas));
            }else{
                echo 'NEPAVYKO ISTRINTI PASKYROS. SASKAITOJE YRA';
            }
           
        }
    }

 
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
    <?php foreach($sarasas as $indexas => $value): ?>
        <div style="background:red; margin: 50px">
    <?php foreach($value as $index => $name): ?>
    
        <li><?= $name ?></li>
         
    <?php endforeach ?>
        <a href="http://localhost/11pamoka/bankas/pridetiLesas.php?index=<?= $indexas ?>">Pridėti</a>
        <a href="http://localhost/11pamoka/bankas/nuskaitytiLesas.php?index=<?= $indexas ?>">Atimti</a>
        <a href="http://localhost/11pamoka/bankas/sarasas.php?index=<?= $indexas ?>">Istrinti saskaita</a>
    </div>
    <?php endforeach ?>

 
</body>
</html>

