<?php

use Core\Url;
?>
<h1>Panel Admina</h1>

<h2>Dodanie nowego konta</h2>

<form action="<?php echo Url::to('/admin/nowe-konto-dodaj') ?>" method="post" class="">
    <div class="form-row">
        <label class="form-label" for="login">Login: </label>
        <input type="text" name="login" id="login" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="password">Hasło: </label>
        <input type="password" name="password" id="password" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="role">Rola: </label>
        <select name="role" id="role" required>
            <option value="pracownik">Pracownik</option>
            <option value="kierownik">Kierownik</option>
            <option value="Administrator">Administrator</option>
        </select>
    </div>
    <div class="row">
        <input type="submit" class="btn btn-1" value="Dodaj nowego użytkownika" />
    </div>
</form>