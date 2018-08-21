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

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'ene')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'feb')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'mar')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'abr')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'may')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'jun')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-2">
            <?= $form->field($model, 'jul')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'ago')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'sep')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'oct')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'nov')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'dic')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <?= $form->field($model, 'recursos_h')->textInput() ?>

    <?= $form->field($model, 'actividad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
