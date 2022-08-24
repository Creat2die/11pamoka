<?php

    //GET trinimas

    if(isset($_GET)){
        $indexPasirinkto = ($_GET['index']);
        $sarasas = json_decode(file_get_contents(__DIR__ . '/data.json'),1);
        foreach($sarasas as $index => $value){
            if($indexPasirinkto == $index){
                if($sarasas[$index]['likutis'] == 0){
                    unset($sarasas[$indexPasirinkto]);
                    $sarasas = array_values($sarasas);
                    echo 'PASkYRA BUVO ISTINTA';
                    file_put_contents(__DIR__ . '/data.json', json_encode($sarasas));
                    
                }else{
                    echo 'NEPAVYKO ISTRINTI PASKYROS. SASKAITOJE YRA';
                    
                }
               
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
        <?php include 'header.php' ?>
        <a href="http://localhost/11pamoka/bankas/sarasas.php">Grįžti</a>
</body>
</html>