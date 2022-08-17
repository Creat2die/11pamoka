<?php
if(isset($_GET['go'])){
    header('Location: http://localhost/11pamoka/18pamoka/blue.php');
    die;
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
<body style="background:crimson">
    <div class="two-links">
        <a href="http://localhost/11pamoka/18pamoka/red.php?go">GO</a>
    </div>
</body>
</html>