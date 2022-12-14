<?php
App\App::view('top', ['title' => $title]);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card m-4">
                <div class="card-header">
                    <h2>Klientų Sąrašas</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach($users as $user) : ?>
                        <li class="list-group-item">
                            <!-- <div class="line"> -->
                                <div class="line__content">
                                    <div class="line__content__type">
                                        Vardas: <?= $user['name'] ?>
                                    </div>
                                    <div class="line__content__type">
                                        Pavardė: <?= $user['surname'] ?>
                                    </div>
                                    <div class="line__content__weight">
                                        Asmens kodas: <?= $user['ak'] ?>
                                    </div>
                                    <div class="line__content__weight">
                                        Sąskaitos numeris: <?= $user['iban'] ?>
                                    </div>
                                    <div class="line__content__weight">
                                        Sąskaitos likutis: <?= $user['money'] ?> Eur
                                    </div>
                                    <?php if ($user['tail']) : ?>
                                        <div class="line__content__tail"></div>
                                    <?php endif ?>
                                </div>
                                <div class="line__buttons">
                                <a href="<?= URL.'users/edit/'.$user['id'] ?>" type="button" class="btn btn-outline-success m-2">Redaguoti</a>
                                <a href="<?= URL.'users/add/'.$user['id'] ?>" type="button" class="btn btn-outline-success m-2">Pridėti lėšų</a>
                                <a href="<?= URL.'users/remove/'.$user['id'] ?>" type="button" class="btn btn-outline-success m-2">Atimti lėšų</a>
                                <form action="<?= URL ?>users/delete/<?= $user['id'] ?>" method="post">
                                    <button type="submit" class="btn btn-outline-danger m-2">Pašalinti</button>
                                </form>
                                <?php if(isset($id) && $id == $user['id']) : ?>
                                <div class="error"><?= $error['neNulis'] ?? '' ?></div>    
                                <?php endif ?>

                            </div>
                            <!-- </div> -->
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
App\App::view('bottom');