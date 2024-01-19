<?php
/* @var array $cars cars in database */

use Core\Url;
?>
<h1>Panel Kierownika</h1>

<h2>Nowy samochód</h2>
<form action="<?php echo Url::to('/kierownik/nowy-samochod') ?>" method="post" class="">
    <div class="form-row">
        <label class="form-label" for="marka">Marka: </label>
        <input type="text" name="marka" id="marka" placeholder="Fiat" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="kolor">Kolor: </label>
        <input type="text" name="kolor" id="kolor" placeholder="Czerwony" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="numer_rejestracyjny">Numer rejestracyjny: </label>
        <input type="text" name="numer_rejestracyjny" id="numer_rejestracyjny" placeholder="QWE123" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="rok_produkcji">Rok produkcji: </label>
        <input type="text" name="rok_produkcji" id="rok_produkcji" placeholder="2003" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="cena_za_jeden_dzien">Cena za jeden dzień: </label>
        <input type="text" name="cena_za_jeden_dzien" id="cena_za_jeden_dzien" placeholder="100.42" required />
    </div>
    <div class="row">
        <input type="submit" class="btn btn-1" value="Dodaj nowy samochód" />
    </div>
</form>


<h2>Lista samochodów</h2>

<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Marka</th>
        <th>Kolor</th>
        <th>Numer rejestracyjny</th>
        <th>Rok produkcji</th>
        <th>Cena za jeden dzień</th>
        <th>Edytuj</th>
        <th>Usuń</th>
    </tr>
    </thead>
    <tbody>
    <?php if($cars): ?>
        <?php $i = 0; foreach($cars as $car): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $car['marka']; ?></td>
                <td><?php echo $car['kolor']; ?></td>
                <td><?php echo $car['numer_rejestracyjny']; ?></td>
                <td><?php echo $car['rok_produkcji']; ?></td>
                <td><?php echo $car['cena_za_jeden_dzien']; ?></td>
                <td><a href="<?php echo Url::to('/kierownik/samochod/edycja', ['id' => $car['id']]) ?>" class="btn btn-edit" title="Edytuj">Edytuj</a></td>
                <td><a href="<?php echo Url::to('/kierownik/samochod/usun', ['id' => $car['id']]) ?>" class="btn btn-delete" title="Usuń">Usuń</a></td>
            </tr>
            <?php $i++; endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8">Nie znaleziono samochodów w bazie danych</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
