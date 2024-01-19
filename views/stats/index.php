<?php
/*  @var int $orderByMonthIlosc count orders in month */
/* @var array $orderByMonthTotalPrice */
/* @var array $allMonth */

use Core\Url;
?>
<h2>Zliczanie ilości i wartości wypożyczonych samochodów w miesiącu</h2>
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