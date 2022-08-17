<?php
echo($_GET['color']);
function doColor(){
    if(!isset($_GET['color'])){
        return 'black';
    } 
    $color = $_GET['color'];

    if(preg_match('/\#[0-9A-F]{6}/i', $color)){
        return  $color;
    }

    if(preg_match('/[0-9A-F]{6}|[0-9A-F]{3}/i', $color)){
        return '#'. $color;
    }
    return '$color';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document023</title>
</head>
<body style="background: <?= doColor() ?> ; width: 100vw; height: 100vw">
<div class="two-links"> 
    <a href="http://localhost/11pamoka/18pamoka/023.php">BE</a>
</div>

<div>
    <form action="http://localhost/11pamoka/18pamoka/023.php" method="get">
    <input type="color" name="color"/>
    <button type="submit" >Do it, please</button>
</div>


</body>
</html>