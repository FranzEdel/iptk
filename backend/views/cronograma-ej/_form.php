<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Objetivos;
use backend\models\Resultados;
use backend\models\Indicadores;
use backend\models\Actividades;


/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaEj */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cronograma-ej-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'proyecto')->dropDownList(
                            ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                            [
                                'prompt' => '-- Seleccione un Proyecto --',
                                'onchange' => '
                                    $.post( "index.php?r=objetivos/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#cronogramaej-objetivo" ).html( data );
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
                                        $( "select#cronogramaej-resultado" ).html( data );
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
                                        $( "select#cronogramaej-indicador" ).html( data );
                                    });
                                '
                            ]
                )->label('3.- Resultado',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'indicador')->dropDownList(
                        ArrayHelper::map(Indicadores::find()->all(), 'id_i', 'nombre'),
                        [
                            'prompt' => '-- Seleccione un Indicador --',
                            'onchange' => '
                                    $.post( "index.php?r=actividades/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#cronogramaej-actividad" ).html( data );
                                    });
                                '    
                        ]
            )->label('4.- Indicador',['class'=>'label-class']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'actividad')->dropDownList(
                            ArrayHelper::map(Actividades::find()->all(), 'id_a', 'nombre'),
                            ['prompt' => '-- Seleccione una Actividad']
            )->label('5.- Actividad',['class'=>'label-class']) ?>
        </div>
    </div>

    <?= $form->field($model, 'item')->textInput(['maxlength' => true])->label('Detalle del Gasto',['class'=>'label-class']) ?>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'ene')->textInput(['maxlength' => true])->label('Enero',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'feb')->textInput(['maxlength' => true])->label('Febrero',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'mar')->textInput(['maxlength' => true])->label('Marzo',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'abr')->textInput(['maxlength' => true])->label('Abril',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'may')->textInput(['maxlength' => true])->label('Mayo',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'jun')->textInput(['maxlength' => true])->label('Junio',['class'=>'label-class']) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-2">
            <?= $form->field($model, 'jul')->textInput(['maxlength' => true])->label('Julio',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'ago')->textInput(['maxlength' => true])->label('Agosto',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'sep')->textInput(['maxlength' => true])->label('Septiembre',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'oct')->textInput(['maxlength' => true])->label('Octubre',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'nov')->textInput(['maxlength' => true])->label('Noviembre',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'dic')->textInput(['maxlength' => true])->label('Diciembre',['class'=>'label-class']) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
