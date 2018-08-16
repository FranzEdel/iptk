<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cronograma-av-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'ene')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'feb')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'mar')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'abr')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'may')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'jun')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-2">
            <?= $form->field($model, 'jul')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'ago')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'sep')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'oct')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'nov')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'dic')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%']) ?>
        </div>

    </div>

    
    <?= $form->field($model, 'recursos_h')->textInput() ?>

    <?= $form->field($model, 'actividad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
