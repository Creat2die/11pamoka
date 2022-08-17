<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background:<?= $_SERVER['REQUEST_METHOD'] == 'POST' ? '#FAFA33' : 'green' ?>">
    <div class="two-links">
        <form action="http://localhost/11pamoka/18pamoka/06.php" method="get">
            <button type="submit">GET</button>
        </form>
    </div>
    <div class="two-links">
        <form action="http://localhost/11pamoka/18pamoka/06.php" method="post">
            <button type="submit">POST</button>
        </form>
    </div>
</body>
</html>