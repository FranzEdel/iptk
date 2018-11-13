<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ActividadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_a') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'presupuestado') ?>

    <?= $form->field($model, 'indicador') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
