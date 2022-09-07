<?php

App\App::view('top', ['title' => $title]);


?>
<h2>Login</h2>
<form action="<?= URL ?>login" method="post">   
    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="pass">
    </div>
    <button type="submit">Login</button>
</form>



<?php

App\App::view('bottom');