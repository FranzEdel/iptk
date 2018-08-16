<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaEj */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cronograma-ej-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ene')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'feb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'may')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oct')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'recursos_h')->textInput() ?>

    <?= $form->field($model, 'actividad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
