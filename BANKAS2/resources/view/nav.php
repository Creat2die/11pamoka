<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>">PAGRINDINIS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>users">VARTOTOJAI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>users/create">NAUJAS VARTOTOJAS</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>api/go">Get Distance</a>
                </li> -->
                <?php if(App\Middlewares\Auth::isLoged()) : ?>
                <li class="nav-item big">
                    <div class="user-nav">
                        <div class="name"><?= $_SESSION['user']['name'] ?></div>
                        <form action="<?= URL ?>logout" method="post">
                            <button type="submit" class="btn btn-outline-danger m-2">ATSIJUNGTI</button>
                        </form>
                    </div>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>login">PRISIJUNGTI</a>
                </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>