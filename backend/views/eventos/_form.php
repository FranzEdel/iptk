<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Eventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_creacion')->widget(
            DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                'language' => 'es', 
                // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>

    <?= $form->field($model, 'proyecto')->dropDownList(
                                ArrayHelper::map(Proyectos::find()->all(),'id_p','nombre_p'),
                                ['prompt' => '-- Proyecto --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar', ['lista'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
