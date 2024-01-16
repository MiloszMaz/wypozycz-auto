<?php
/* @var string $__path content of controller view file */
/* @var string $__title title of page */

use Core\Url;
use Core\Auth;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__title ?? ''; ?></title>
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>
<?php if(Auth::isLogged()): ?>
<header>
<p>
    Zalogowany w systemie jako <strong><?php echo Auth::getLogin() ?></strong>, przypisana rola: <strong><?php echo Auth::getRole() ?></strong>
</p>
</header>
<?php endif; ?>
<menu>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/') ?>" title="Strona Główna" class="menu-site-item-link">
            Strona Główna
        </a>
    </li>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/login') ?>" title="Strona Główna" class="menu-site-item-link">
            Strona Główna
        </a>
    </li>
    <?php if(Auth::isAdministrator()): ?>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/admin/nowe-konto') ?>" title="Dodaj nowe konto" class="menu-site-item-link">
            Dodaj nowe konto
        </a>
    </li>
    <?php endif; ?>
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
    <?php require_once $__path; ?>
</section>

</body>
</html>