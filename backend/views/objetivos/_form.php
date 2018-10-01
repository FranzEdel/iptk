<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;

/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetivos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'indicador')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'proyecto')->dropDownList(
                                        ArrayHelper::map(Proyectos::find()->all(),'id_p','nombre_p'),
                                        ['prompt' => '-- Proyecto --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
