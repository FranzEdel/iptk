<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ObjetivosEspecificosDetalles */

$this->title = 'Create Objetivos Especificos Detalles';
$this->params['breadcrumbs'][] = ['label' => 'Objetivos Especificos Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivos-especificos-detalles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
