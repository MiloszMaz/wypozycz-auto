<?php
/* @var array $car car from db */

use Core\Url;
?>
<h1>Złóż zamówienie</h1>

<h2>Dane samochodu</h2>
<p>
<ul>
    <li>
        Marka: <b><?php echo $car['marka'] ?></b>
    </li>
    <li>
        Kolor: <b><?php echo $car['kolor'] ?></b>
    </li>
    <li>
        Numer rejestracyjny: <b><?php echo $car['numer_rejestracyjny'] ?></b>
    </li>
    <li>
        Rok produkcji: <b><?php echo $car['rok_produkcji'] ?></b>
    </li>
    <li>
        Cena za jeden dzień: <b><?php echo $car['cena_za_jeden_dzien'] ?> zł</b>
    </li>
</ul>

</p>

<form action="<?php echo Url::to('/zloz-zamowienie', ['idCar' => $car['id']]) ?>" method="post" class="">
    <fieldset>
        <legend>Wypożyczenie</legend>

        <div class="form-row">
            <label class="form-label" for="data">Od kiedy: (format YYYY-MM-DD)</label>
            <input type="text" name="data" id="data" placeholder="2024-01-20" required />
        </div>
        <div class="form-row">
            <label class="form-label" for="ilosc_dni">Na ile dni:</label>
            <input type="text" name="ilosc_dni" id="ilosc_dni" placeholder="12" required />
        </div>
        <div class="form-row">
            <label class="form-label" for="uwagi">Uwagi:</label>
            <textarea name="uwagi" id="uwagi" placeholder="Treść uwagi..." required></textarea>
        </div>
    </fieldset>
    <fieldset>
        <legend>
            Dane klienta
        </legend>
        <div class="form-row">
            <label class="form-label" for="imie">Imię</label>
            <input type="text" name="imie" id="imie" placeholder="Janek" required />
        </div>
        <div class="form-row">
            <label class="form-label" for="nazwisko">Nazwisko:</label>
            <input type="text" name="nazwisko" id="nazwisko" placeholder="Kowalski" required />
        </div>
        <div class="form-row">
            <label class="form-label" for="pesel">PESEL:</label>
            <input type="text" name="pesel" id="pesel" placeholder="12345678901" required />
        </div>
    </fieldset>

    <div class="row">
        <input type="submit" class="btn btn-1" value="Złóż zamówienie na wypożyczenie samochodu" />
    </div>
</form>