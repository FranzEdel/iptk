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

    <?= $form->field($model, 'objetivo')->dropDownList(
                ArrayHelper::map(Objetivos::find()->where(['proyecto' => $id_p])->all(), 'id_o', 'nombre'),
                [
                    'prompt' => '-- Seleccione un Objetivo --',
                    'onchange' => '
                            $.post( "index.php?r=resultados/lists&id='.'"+$(this).val(), function(data){
                                $( "select#indicadores-resultado" ).html( data );
                            });
                        '
                ]
    )->label('Objetivo',['class'=>'label-class']) ?>

    <?= $form->field($model, 'resultado')->dropDownList(
                        ArrayHelper::map(Resultados::find()->where(['proyecto' => $id_p])->all(), 'id_r', 'nombre'),
                        [
                            'prompt' => '-- Seleccione un Resultado --'
                        ]
            )->label('Resultado',['class'=>'label-class']) ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2])->label('Nombre del Indicador',['class'=>'label-class']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
