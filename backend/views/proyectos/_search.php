<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProyectosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_p') ?>

    <?= $form->field($model, 'codigo_p') ?>

    <?= $form->field($model, 'nombre_p') ?>

    <?= $form->field($model, 'objetivo_general') ?>

    <?= $form->field($model, 'agencias') ?>

    <?php // echo $form->field($model, 'municipios') ?>

    <?php // echo $form->field($model, 'periodo') ?>

    <?php // echo $form->field($model, 'fecha_ini') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'responsable') ?>

    <?php // echo $form->field($model, 'num_trabajadores') ?>

    <?php // echo $form->field($model, 'herramienta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
