<?php

App\App::view('top', ['title' => $title]);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card m-4">
                <div class="card-header">
                     <h2>Registruoti Klientą</h2>
                     <form action="<?= URL ?>users/store" method="post">
                        <div class="form-group">
                            <label>Kliento Vardas</label>
                            <input type="text" class="form-control" name="name" value="<?= $_POST['name'] ?? '' ?>">
                            <div class="error"><?= $error['name'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label>Kliento Pavardė</label>
                            <input type="text" class="form-control" name="surname" value="<?= $_POST['surname'] ?? '' ?>">
                            <div class="error"><?= $error['surname'] ?? ''?></div>
                        </div>
                        <div class="form-group">
                            <label>Asmens Kodas</label>
                            <input type="text" class="form-control" name="ak" value="<?= $_POST['ak'] ?? '' ?>">
                            <div class="error"><?= $error['ak'] ?? '' ?></div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="tail">
                            <label class="form-check-label">Has tail?</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
        </div>
    </div>

</div>

</div>
<?php


App\App::view('bottom');