<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Resultados;
use backend\models\Actividades;
use backend\models\RecursosHumanos;

use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cronograma-av-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'proyecto')->dropDownList(
                            ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                            [
                                'prompt' => '-- Seleccione un Proyecto',
                                'onchange' => '
                                    $.post( "index.php?r=resultados/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#cronogramaav-resultado" ).html( data );
                                    });
                                '
                            ]
            )->label('1.- Proyecto',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'resultado')->dropDownList(
                        ArrayHelper::map(Resultados::find()->all(), 'id_r', 'codNom'),
                        [
                            'prompt' => '-- Seleccione un Resultado',
                            'onchange' => '
                                    $.post( "index.php?r=actividades/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#cronogramaav-actividad" ).html( data );
                                    });
                                '
                        ]
            )->label('2.- Resultado',['class'=>'label-class']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'actividad')->dropDownList(
                            ArrayHelper::map(Actividades::find()->all(), 'id_a', 'nombre'),
                            ['prompt' => '-- Seleccione una Actividad --']
            )->label('3.- Seguimiento a la Actividad',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'gestion')->textInput(['maxlength' => true])->label('Gestión',['class'=>'label-class'])?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'ene')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Enero',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'feb')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Febrero',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'mar')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Marzo',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'abr')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Abril',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'may')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Mayo',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'jun')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Junio',['class'=>'label-class']) ?>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-2">
            <?= $form->field($model, 'jul')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Julio',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'ago')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Agosto',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'sep')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Septiembre',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'oct')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Octubre',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'nov')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Noviembre',['class'=>'label-class']) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'dic')->dropDownList(['0' => 'NP','25' =>'25%', '50' => '50%', '75' =>'75%', '100' => '100%'])->label('Diciembre',['class'=>'label-class']) ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
