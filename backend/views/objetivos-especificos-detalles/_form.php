<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ObjetivosEspecificosDetalles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetivos-especificos-detalles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'objetivo_esp')->textInput() ?>

    <?= $form->field($model, 'indicador')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'verificador')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'avance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
