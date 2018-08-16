<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaEj */

$this->title = 'Update Cronograma Ej: ' . $model->id_ce;
$this->params['breadcrumbs'][] = ['label' => 'Cronograma Ejs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ce, 'url' => ['view', 'id' => $model->id_ce]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cronograma-ej-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
