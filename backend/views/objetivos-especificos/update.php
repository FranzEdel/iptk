<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ObjetivosEspecificos */

$this->title = 'Update Objetivos Especificos: ' . $model->id_oe;
$this->params['breadcrumbs'][] = ['label' => 'Objetivos Especificos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_oe, 'url' => ['view', 'id' => $model->id_oe]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="objetivos-especificos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
