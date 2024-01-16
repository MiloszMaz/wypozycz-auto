<?php
/* @var string $__path content of controller view file */

use Core\Url;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="./css/style.css" rel="stylesheet">
</head>
<body>

<menu>
    <li class="menu-site-item">
        <a href="/" title="Strona Główna" class="menu-site-item-link">
            Strona Główna
        </a>
    </li>
    <li class="menu-site-item">
        <a href="/" title="Strona Główna" class="menu-site-item-link">
            Strona Główna
        </a>
    </li>
    <li class="menu-site-item">
        <a href="<?php echo Url::to('/login') ?>" title="Logowanie" class="menu-site-item-link">
            Logowanie
        </a>
    </li>
</menu>

<div class="container">
    <?php require_once $__path; ?>
</div>

</body>
</html>