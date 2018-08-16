<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaEj */

$this->title = 'Create Cronograma Ej';
$this->params['breadcrumbs'][] = ['label' => 'Cronograma Ejs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cronograma-ej-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
