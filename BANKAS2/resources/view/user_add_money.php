<?php
App\App::view('top', ['title' => $title]);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card m-4">
                <div class="card-header">
                    <h2>Papildyti sąskaitą</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="line">
                                <div class="line__content">
                                    <div class="line__content__type">
                                        <?= $user['name'] ?>
                                    </div>
                                    <div class="line__content__type">
                                        <?= $user['surname'] ?>
                                    </div>
                                    <div class="line__content__weight">
                                        <?= $user['ak'] ?>
                                    </div>
                                    <div class="line__content__weight">
                                        <?= $user['iban'] ?>
                                    </div>
                                    <div class="line__content__weight">
                                        <?= $user['money'] ?>
                                    </div>
                                    <?php if ($user['tail']) : ?>
                                    <div class="line__content__tail"></div>
                                    <?php endif ?>
                                </div>
                                <div class="line__buttons">
                                    <form action="<?= URL ?>users/addmoney/<?= $user['id'] ?>" method="post">
                                        <div class="form-group">
                                            <label>Norima suma:</label>
                                            <input type="number" class="form-control" name="money" value="">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-5">Pridėti</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
App\App::view('bottom');