<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAvSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cronograma-av-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ca') ?>

    <?= $form->field($model, 'ene') ?>

    <?= $form->field($model, 'feb') ?>

    <?= $form->field($model, 'mar') ?>

    <?= $form->field($model, 'abr') ?>

    <?php // echo $form->field($model, 'may') ?>

    <?php // echo $form->field($model, 'jun') ?>

    <?php // echo $form->field($model, 'jul') ?>

    <?php // echo $form->field($model, 'ago') ?>

    <?php // echo $form->field($model, 'sep') ?>

    <?php // echo $form->field($model, 'oct') ?>

    <?php // echo $form->field($model, 'nov') ?>

    <?php // echo $form->field($model, 'dic') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'recursos_h') ?>

    <?php // echo $form->field($model, 'actividad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
