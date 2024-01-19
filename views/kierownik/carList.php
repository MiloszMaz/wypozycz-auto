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
        <th>ID</th>
        <th>Marka</th>
        <th>Kolor</th>
        <th>Numer rejestracyjny</th>
        <th>Rok produkcji</th>
        <th>Cena za jeden dzień</th>
        <th>Edytuj</th>
        <th>Ukryj/Odkryj</th>
    </tr>
    </thead>
    <tbody>
    <?php if($cars): ?>
        <?php foreach($cars as $car): ?>
            <tr <?php if($car['hide']): ?>class="tr-car-hidden"<?php endif; ?>>
                <td><?php echo $car['id']; ?></td>
                <td><?php echo $car['marka']; ?></td>
                <td><?php echo $car['kolor']; ?></td>
                <td><?php echo $car['numer_rejestracyjny']; ?></td>
                <td><?php echo $car['rok_produkcji']; ?></td>
                <td><?php echo $car['cena_za_jeden_dzien']; ?></td>
                <td><a href="<?php echo Url::to('/kierownik/samochod/edycja', ['id' => $car['id']]) ?>" class="btn btn-edit" title="Edytuj">Edytuj</a></td>
                <td>
                    <?php if($car['hide']): ?>
                        <a href="<?php echo Url::to('/kierownik/samochod/ukryj', ['id' => $car['id'], 'makeShow' => 1]) ?>" class="btn btn-delete" title="Odkryj">Odkryj</a>
                    <?php else: ?>
                        <a href="<?php echo Url::to('/kierownik/samochod/ukryj', ['id' => $car['id']]) ?>" class="btn btn-delete" title="Ukryj">Ukryj</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8">Nie znaleziono samochodów w bazie danych</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

<p class="text-help">
    Usuwanie samochodów jest niemożliwe aby nie utrudnić pracy wypożyczeń - można jedynie ukryć aby nie można było wypożyczyć danego samochodu.
</p>