<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Objetivos;

/* @var $this yii\web\View */
/* @var $model backend\models\Resultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_r')->dropDownList(['R1' => 'R1', 'R2' => 'R2', 'R3' => 'R3', 'R4' => 'R4', 'R5' => 'R5', 'R6' => 'R6', 'R7' => 'R7', 'R8' => 'R8', 'R9' => 'R9', 'R10' => 'R10'],
                                                        ['prompt' => '-- Código --']) ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2])->label('Nombre del Resulatdo',['class'=>'label-class']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>