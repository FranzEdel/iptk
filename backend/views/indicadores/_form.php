<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Proyectos;
use backend\models\Objetivos;
use backend\models\Resultados;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Indicadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indicadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'proyecto')->dropDownList(
                            ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                            [
                                'prompt' => '-- Seleccione un Proyecto --',
                                'onchange' => '
                                    $.post( "index.php?r=objetivos/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#indicadores-objetivo" ).html( data );
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
                                        $( "select#indicadores-resultado" ).html( data );
                                    });
                                '
                        ]
            )->label('2.- Objetivo',['class'=>'label-class']) ?>
        </div>
    </div>

    <?= $form->field($model, 'resultado')->dropDownList(
                        ArrayHelper::map(Resultados::find()->all(), 'id_r', 'nombre'),
                        [
                            'prompt' => '-- Seleccione un Resultado --'
                        ]
            )->label('3.- Resultado',['class'=>'label-class']) ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2])->label('Nombre del nuevo Indicador',['class'=>'label-class']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
