<?php
/* @var string $__path content of controller view file */
/* @var string $__title title of page */

use Core\Url;
use Core\Auth;
use Core\FlashMessage;
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__title ?? ''; ?></title>
    <link href="<?php echo Url::to('/css/style.css') ?>" rel="stylesheet">
</head>
<body>
<?php if(Auth::isLogged()): ?>
<header>
<p>
    <small>Zalogowany w systemie jako</small> <strong><?php echo Auth::getLogin() ?></strong>, <small>przypisana rola:</small> <strong><?php echo Auth::getRole() ?></strong>
</p>
</header>
<?php endif; ?>
<?php if(Auth::isLogged()): ?>
<menu id="admin-menu">
    <?php if(Auth::isPracownik()): ?>
        <li class="menu-site-item">
            <a href="<?php echo Url::to('/pracownik/lista-zamowien') ?>" title="Lista zamówień" class="menu-site-item-link">
                Lista zamówień
            </a>
        </li>
    <?php endif; ?>

    <?php if(Auth::isKierownik()): ?>
        <li class="menu-site-item">
            <a href="<?php echo Url::to('/kierownik/lista-samochodow') ?>" title="Lista samochodów" class="menu-site-item-link">
                Lista samochodów
            </a>
        </li>
    <?php endif; ?>

    <?php if(Auth::isAdministrator()): ?>
        <li class="menu-site-item">
            <a href="<?php echo Url::to('/admin/nowe-konto') ?>" title="Dodaj nowe konto" class="menu-site-item-link">
                Dodaj nowe konto
            </a>
        </li>
    <?php endif; ?>
</menu>
<?php endif; ?>

<menu>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/') ?>" title="Strona Główna" class="menu-site-item-link">
            Strona Główna
        </a>
    </li>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/zamowienie') ?>" title="Złóż zamówienie" class="menu-site-item-link">
            Złóż zamówienie
        </a>
    </li>
    <?php if(Auth::isLogged()): ?>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/logout') ?>" title="Wyloguj" class="menu-site-item-link">
            Wyloguj
        </a>
    </li>
    <?php else: ?>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/login') ?>" title="Logowanie" class="menu-site-item-link">
            Logowanie
        </a>
    </li>
    <?php endif; ?>
</menu>

<section id="site-content" class="container">
    <?php if(FlashMessage::has('success')): ?>
    <div class="alert alert-success">
        <p><?php echo FlashMessage::get('success') ?></p>
    </div>
    <?php endif; ?>
    <?php if(FlashMessage::has('error')): ?>
        <div class="alert alert-error">
            <p><?php echo FlashMessage::get('error') ?></p>
        </div>
    <?php endif; ?>

    <?php require_once $__path; ?>
</section>

<footer>
    &copy; Wypożycz Auto &amp; <strong>Miłosz Mazurewicz</strong>
</footer>
</body>
</html>