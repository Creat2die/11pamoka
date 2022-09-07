<?php

if (isset($_SESSION['msg'])){
    $msg =$_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>

<?php if (isset($msg)) : ?>
    <div>
        <?php foreach($msg as $m) :?>
            <div class="msg" style=""background:<?=$m['type'] ?>">
                <?= $m['text'] ?>
            </div>
            <?php endforeach ?>
    </div>
<?php endif ?>