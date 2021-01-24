<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="intro">
</div>
<header class="header">
    <div class="container">
        <nav class="nav">
            <a class="nav-link" href="/index"">Форма обратной связи</a>
            <a class="nav-link" href="/news">Новости</a>
            <a class="nav-link" href="/services">Сервисы </a>
            <a class="nav-link" href="/about">О компании </a>
        </nav>
    </div>
</header>
<?= $content ?>

<footer class="footer">

</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
