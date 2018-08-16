<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ObjetivosEspecificosDetalles */

$this->title = 'Update Objetivos Especificos Detalles: ' . $model->id_oed;
$this->params['breadcrumbs'][] = ['label' => 'Objetivos Especificos Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_oed, 'url' => ['view', 'id' => $model->id_oed]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="objetivos-especificos-detalles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
