<?php
/* @var array $cars cars in database */
/* @var array $topMonthCar top car of this month */

use Core\Url;
?>
<?php if($topMonthCar): ?>
<article class="top">
    <h2>TOP tego miesiąca</h2>
    <div class="top-marka">
        <?php echo $topMonthCar['marka'] ?>
    </div>
</article>
<?php endif; ?>


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
            <td><a href="<?php echo Url::to('/zamowienie', ['id' => $car['id']]) ?>" class="btn btn-order" title="Wypożycz">Wypożycz</a></td>
        </tr>
        <?php $i++; endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="7">Nie znaleziono samochodów w bazie danych</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
