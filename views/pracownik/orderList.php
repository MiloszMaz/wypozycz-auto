<?php
/* @var array $orders orders for cars in database */

use Core\Url;
?>
<h1>Lista zamówień</h1>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Ilość dni</th>
        <th>Uwagi</th>
        <th>Czy przyjęte</th>
        <th>Przyjmij</th>
        <th>Usuń</th>
    </tr>
    </thead>
    <tbody>
    <?php if($orders): ?>
        <?php foreach($orders as $order): ?>
            <tr>
                <th><?php echo $order['id']; ?></th>
                <td><?php echo $order['data']; ?></td>
                <td><?php echo $order['ilosc_dni']; ?></td>
                <td><?php echo $order['uwagi']; ?></td>
                <td><?php echo ($order['przyjete'] ? '<span class="text-success">Tak</span>' : 'Nie'); ?></td>
                <td><a href="<?php echo Url::to('/pracownik/zamowienie/przyjmij', ['id' => $order['id']]) ?>" class="btn btn-accept" title="Przyjmij">Przyjmij</a></td>
                <td><a href="<?php echo Url::to('/pracownik/zamowienie/usun', ['id' => $order['id']]) ?>" class="btn btn-delete" title="Usuń">Usuń</a></td>
            </tr>
            <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Nie znaleziono zamówień w bazie danych</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
