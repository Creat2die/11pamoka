<?php

view('top');

?>


<fieldset>
    <legend>Login </legend>
    <form action="<?= URL . 'login' ?>" method="post"></form>
        Name: <input type="text" name="name" />
        Password: <input type="password" name="psw">
        <button type="submit">Login</button>
</fieldset>


<?php

view('bottom');