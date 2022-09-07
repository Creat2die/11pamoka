<?php

$host = '127.0.0.1';
$db   = 'del_finu';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //DELETE FROM table_name WHERE condition;
    $sql = "
    DELETE FROM trees
    WHERE id = ?
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['id']]);

    header('Location: http://localhost/11pamoka/32');
    die;

}


$sql = "
    SELECT id, type, height, title
    FROM trees 
    WHERE (type = 2 OR type = 3) 
    ORDER BY type, title 
";

$stmt = $pdo->query($sql);

$data = $stmt->fetchAll();

?>

<ul>
    <?php foreach($data as $t) : ?>
        
    <li>ID: <?=$t['id'] ?> <?=['Lapuotis', 'Spygliuotis', 'Palmė'][$t['type'] -1] ?> <?=$t['height'] ?>m <?=$t['title'] ?></li>

    <?php endforeach ?>
</ul>


<form action="" method="post">
    ID: <input type="text" name="id"><br>
    <button type="submit">DELETE</button>
</form>