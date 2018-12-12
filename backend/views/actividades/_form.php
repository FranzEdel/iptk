<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Resultados;
use backend\models\RecursosHumanos;

/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividades-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'proyecto')->dropDownList(
                    ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                    [
                        'prompt' => '-- Seleccione un Proyecto --',
                        'onchange' => '
                            $.post( "index.php?r=resultados/lists&id='.'"+$(this).val(), function(data){
                                $( "select#actividades-resultado" ).html( data );
                            });
                        '
                    ]
    )->label('1.- Proyecto',['class'=>'label-class']) ?>

    <?= $form->field($model, 'resultado')->dropDownList(
                    ArrayHelper::map(Resultados::find()->all(), 'id_r', 'codNom'),
                    [
                        'prompt' => '-- Seleccione un Resultado --',
                    ]
        )->label('2.- Resultado',['class'=>'label-class']) ?>
    
    <?= $form->field($model, 'codigo_a')->dropDownList(['A1.' => 'A1.', 'A2.' => 'A2.', 'A3.' => 'A3.', 'A4.' => 'A4.', 'A5.' => 'A5.', 'A6.' => 'A6.', 'A7.' => 'A7.', 'A8.' => 'A8.', 'A9.' => 'A9.', 'A10.' => 'A10.'],
                                                        ['prompt' => '-- Código --']) ?>
 
    <?= $form->field($model, 'nombre')->textarea(['rows' => 2])->label('Nombre de la nueva Actividad',['class'=>'label-class']) ?>

    <?= $form->field($model, 'indicador')->textarea(['rows' => 2])->label('Indicadores',['class'=>'label-class']) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 4])->label('Descripción',['class'=>'label-class']) ?>

    <?= $form->field($model, 'recursos')->textarea(['rows' => 2])->label('recursos',['class'=>'label-class']) ?>

    <?= $form->field($model, 'presupuestado')->textInput(['maxlength' => true])->label('Costos ($us)',['class'=>'label-class']) ?>

    <?= $form->field($model, 'rrhh')->dropDownList(
                ArrayHelper::map(RecursosHumanos::find()->all(), 'id_rh', 'fullName'),
                ['prompt' => '-- Seleccione los Recursos --']
    )->label('Recursos humanos para la actividad',['class'=>'label-class']) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
