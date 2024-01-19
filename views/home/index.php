<?php
/* @var array $cars cars in database */

use Core\Url;
?>
<h1>Lista samochodów</h1>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Marka</th>
            <th>Kolor</th>
            <th>Numer rejestracyjny</th>
            <th>Rok produkcji</th>
            <th>Cena za jeden dzień</th>
            <th>Wypożycz</th>
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
            <td></td>
        </tr>
        <?php $i++; endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="7">Nie znaleziono samochodów w bazie danych</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
