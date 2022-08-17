<?php
view('top');
?>

<?php if(isLogged()) : ?>
    <h2> Labas, <?= $_SESSION['user']['name'] ?></h2>
    <?php view('logout') ?>
    <?php else : ?>
        <a href="<?= URL?>login" class="link">Login HERE</a>

<?php endif ?>


<?php
view('bottom');