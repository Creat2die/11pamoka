<?php
//POST scenarijus
$erroras='';
if('POST' == $_SERVER['REQUEST_METHOD'] ){

    $ra = $_POST ?? 'Nieko nera';

 
    if(isset($_POST['vardas']) &&  strlen($_POST['vardas'])>3){
    

        if(!file_exists(__DIR__ . '/data.json')){
            file_put_contents(__DIR__ . '/data.json', json_encode([]));
        }
 
        $data =json_decode(file_get_contents(__DIR__ . '/data.json', 1));
    
        $data[] = $ra;
    
        $erroras='';

        file_put_contents(__DIR__ . '/data.json', json_encode($data));
    
        header("Location: http://localhost/11pamoka/bankas/pagrindinis.php");
        die;

    } else{
        $erroras='neveikia';
    
    
    }
    // if(preg_match("/^[3-9][0-9]{2}(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])[0-9]{4}$/", "$_POST('asmensKodas')")){
    //    echo 'blogai';

    // }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php include  __DIR__ . 'header.php' ?>
    <div style="display: flex; align-items: center; flex-direction: column; ">
    <form action="http://localhost/11pamoka/bankas/pagrindinis.php" method="post">
        Jūsų vardas
    <input type="text" name="vardas" required>
        Jūsų Pavardė
    <input type="text" name="pavarde" required>
        Jūsų asmens kodas
    <input type="number" name="asmensKodas"  min="10000000000" max="99999999999" required>
        Jūsų sąskaitos numeris
    <input type="text" name="saskaitosNumeris" value="LT<?= rand(100000000000000000, 999999999999999999) ?>" readonly>
    <input type="text" name="likutis" value="0" readonly hidden>
    <button type="submit">Sukurti Sąskaitą</button>
    </form>
    </div>
    <div style="background: red">
        <h3><?= $erroras ?></h3>
    </div>
</body>
</html>