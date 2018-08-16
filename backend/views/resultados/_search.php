<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ResultadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_r') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'avance') ?>

    <?= $form->field($model, 'objetivo_e') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
