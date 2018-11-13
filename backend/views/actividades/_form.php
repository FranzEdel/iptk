<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Objetivos;
use backend\models\Resultados;
use backend\models\Indicadores;
use backend\models\RecursosHumanos;

/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividades-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'proyecto')->dropDownList(
                            ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                            [
                                'prompt' => '-- Seleccione un Proyecto --',
                                'onchange' => '
                                    $.post( "index.php?r=objetivos/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#actividades-objetivo" ).html( data );
                                    });
                                '
                            ]
            )->label('1.- Proyecto',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'objetivo')->dropDownList(
                        ArrayHelper::map(Objetivos::find()->all(), 'id_o', 'nombre'),
                        [
                            'prompt' => '-- Seleccione un Objetivo --',
                            'onchange' => '
                                    $.post( "index.php?r=resultados/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#actividades-resultado" ).html( data );
                                    });
                                '
                        ]
            )->label('2.- Objetivo',['class'=>'label-class']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'resultado')->dropDownList(
                            ArrayHelper::map(Resultados::find()->all(), 'id_r', 'nombre'),
                            [
                                'prompt' => '-- Seleccione un Resultado --',
                                'onchange' => '
                                    $.post( "index.php?r=indicadores/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#actividades-indicador" ).html( data );
                                    });
                                '
                            ]
                )->label('3.- Resultado',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'indicador')->dropDownList(
                        ArrayHelper::map(Indicadores::find()->all(), 'id_i', 'nombre'),
                        ['prompt' => '-- Seleccione un Indicador --']
            )->label('4.- Indicador',['class'=>'label-class']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'nombre')->textarea(['rows' => 2])->label('Nombre de la nueva Actividad',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'presupuestado')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'rrhh')->dropDownList(
                        ArrayHelper::map(RecursosHumanos::find()->all(), 'id_rh', 'fullName'),
                        ['prompt' => '-- Seleccione los Recursos --']
            )->label('Recursos humanos para la actividad',['class'=>'label-class']) ?>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
