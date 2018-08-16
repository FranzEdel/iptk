<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],

        ['label' => 'Acerca de Nosotros', 'url' => ['/site/snosotros'], 'items' => [
            ['label' => 'Antecedentes', 'url' => ['site/antecedentes']],
            ['label' => 'Identidad institucional', 'url' => ['site/identidad']],
            ['label' => 'Visión, Misión y Mandatos', 'url' => ['site/mision']],
            ['label' => 'Objetivos Estrategicos', 'url' => ['site/objetivos']],
            ['label' => 'Estructura Organizacional', 'url' => ['site/estructura']],
        ]],

        ['label' => 'Que hacemos', 'url' => ['/site/qhacemos'], 'items' => [
            ['label' => 'Plan de Acción', 'url' => ['site/obestrategicos']],
            ['label' => 'Donde Trabajamos', 'url' => ['site/dondetrabajamos']],
            ['label' => 'Con quienes nos relacionamos', 'url' => ['site/nosrelacionamos']],
        ]],
        ['label' => 'Nuestros Logros', 'url' => ['/site/logros']],
        ['label' => 'Como contactarnos', 'url' => ['/site/contact']],
        ['label' => 'Revista Digital', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="pull-right">
            <b style="font-size: 7px;"><a href="https://twitter.com/franzedel">FETB</a></b>
        </div>
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
