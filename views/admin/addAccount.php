<?php
/* @var array $users list of users */

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

<h2>Lista kont</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Rola</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <th><?php echo $user['id'] ?></th>
            <td><?php echo $user['login'] ?></td>
            <td><?php echo $user['role'] ?></td>
            <td><a href="<?php echo Url::to('/admin/konto/edycja', ['id' => $user['id']]) ?>" class="btn btn-edit" title="Edytuj">Edytuj</a></td>
            <td><a href="<?php echo Url::to('/admin/konto/usun', ['id' => $user['id']]) ?>" class="btn btn-delete" title="Usuń">Usuń</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>