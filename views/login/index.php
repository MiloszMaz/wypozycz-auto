<?php

use Core\Url;
?>

<form action="<?php echo Url::to('/login-go') ?>" method="post" class="">
    <div class="form-row">
        <label class="form-label" for="login">Login: </label>
        <input type="text" name="login" id="login" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="password">Hasło: </label>
        <input type="password" name="password" id="password" required />
    </div>
    <div class="row">
        <input type="submit" class="btn btn-1" value="Zaloguj" />
    </div>
</form>