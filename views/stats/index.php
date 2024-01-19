<?php
/*  @var int $orderByMonthIlosc count orders in month */
/* @var array $orderByMonthTotalPrice */
/* @var array $allMonth */
/* @var array $allDays */
/* @var array $allDaysMarka */
/* @var array $allMonthKolor */

use Core\Url;
?>
<h2>1. Zliczanie ilości i wartości wypożyczonych samochodów po każdym dniu</h2>
<table class="table">
    <thead>
    <tr>
        <th>Miesiąc</th>
        <th>Ilość</th>
        <th>Wartość</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($allDays as $day): ?>
        <tr>
            <td><?php echo $day['date'] ?></td>
            <td><?php echo $day['ilosc'] ?></td>
            <td><?php echo $day['price']  ?> zł</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<hr>

<h2>2. Zliczanie ilości i wartości wypożyczonych samochodów po każdym miesiącu</h2>
<table class="table">
    <thead>
    <tr>
        <th>Miesiąc</th>
        <th>Ilość</th>
        <th>Wartość</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($allMonth as $month): ?>
        <tr>
            <td><?php echo $month['date'] ?></td>
            <td><?php echo $month['ilosc'] ?></td>
            <td><?php echo $month['price']  ?> zł</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<hr>

<h2>3. Zliczanie ilości i wartości wypożyczonych samochodów według marki po każdym dniu</h2>
<table class="table">
    <thead>
    <tr>
        <th>Miesiąc</th>
        <th>Ilość</th>
        <th>Wartość</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($allDaysMarka as $day): ?>
        <tr>
            <td colspan="3"><?php echo $day['date'] ?></td>
        </tr>
        <?php foreach($day['result'] as $item): ?>
            <tr class="sub-tr">
                <td><?php echo $item['marka'] ?></td>
                <td><?php echo $item['ilosc'] ?></td>
                <td><?php echo $item['cena']  ?> zł</td>
            </tr>
        <?php endforeach; endforeach; ?>
    </tbody>
</table>

<hr>

<h2>4. Zliczanie ilości i wartości wypożyczonych samochodów według koloru po każdym miesiącu</h2>