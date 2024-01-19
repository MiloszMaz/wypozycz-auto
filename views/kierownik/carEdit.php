<?php
/* @var array $car one car in database */

use Core\Url;
?>
<h1>Panel Kierownika</h1>

<h2>Edytuj samochód o id #<?php echo $car['id'] ?></h2>
<form action="<?php echo Url::to('/kierownik/samochod/zapisz-edycje', ['id' => $car['id']]) ?>" method="post" class="">
    <div class="form-row">
        <label class="form-label" for="marka">Marka: </label>
        <input type="text" name="marka" id="marka" placeholder="Fiat" value="<?php echo $car['marka'] ?>" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="kolor">Kolor: </label>
        <input type="text" name="kolor" id="kolor" placeholder="Czerwony" value="<?php echo $car['kolor'] ?>" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="numer_rejestracyjny">Numer rejestracyjny: </label>
        <input type="text" name="numer_rejestracyjny" id="numer_rejestracyjny" placeholder="QWE123" value="<?php echo $car['numer_rejestracyjny'] ?>" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="rok_produkcji">Rok produkcji: </label>
        <input type="text" name="rok_produkcji" id="rok_produkcji" placeholder="2003" value="<?php echo $car['rok_produkcji'] ?>" required />
    </div>
    <div class="form-row">
        <label class="form-label" for="cena_za_jeden_dzien">Cena za jeden dzień: </label>
        <input type="text" name="cena_za_jeden_dzien" id="cena_za_jeden_dzien" placeholder="100.42"  value="<?php echo $car['cena_za_jeden_dzien'] ?>"required />
    </div>
    <div class="row">
        <input type="submit" class="btn btn-edit" value="Zapisz samochód" />
    </div>
</form>
