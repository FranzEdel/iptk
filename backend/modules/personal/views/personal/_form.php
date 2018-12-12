<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Personal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($user, 'email')->textInput() ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($user, 'username')->textInput()->label('Nombre de Usuario',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($user, 'password_hash')->passwordInput() ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'estado')->dropDownList(['activo' => 'Activo', 'inactivo' => 'Inactivo'], ['prompt' => '-- Estado --']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'rol')->dropDownList(['administrador' => 'Administrador', 'coordinador' => 'Coordinador'], ['prompt' => '-- Rol --']) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
