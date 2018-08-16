<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAv */

$this->title = 'Update Cronograma Av: ' . $model->id_ca;
$this->params['breadcrumbs'][] = ['label' => 'Cronograma Avs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ca, 'url' => ['view', 'id' => $model->id_ca]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cronograma-av-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
