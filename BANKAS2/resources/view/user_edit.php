<?php
App\App::view('top', ['title' => $title]);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card m-4">
                <div class="card-header">
                    <h2>Redaguoti kliento duomenys</h2>
                </div>
                <div class="card-body">
                    <form action="<?= URL ?>users/update/<?= $user['id'] ?>" method="post">
                        <div class="form-group">
                            <label>Vardas</label>
                            <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Pavardė</label>
                            <input type="text" class="form-control" name="surname" value="<?= $user['surname'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Asmens kodas</label>
                            <input type="text" class="form-control" name="ak" value="<?= $user['ak'] ?>">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="tail" <?= $user['tail'] ? 'checked' : '' ?>>
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