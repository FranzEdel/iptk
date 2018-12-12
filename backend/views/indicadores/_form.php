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

    <?= $form->field($model, 'proyecto')->dropDownList(
                    ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                    [
                        'prompt' => '-- Seleccione un Proyecto --',
                        'onchange' => '
                            $.post( "index.php?r=resultados/lists&id='.'"+$(this).val(), function(data){
                                $( "select#indicadores-resultado" ).html( data );
                            });
                        '
                    ]
    )->label('1.- Proyecto',['class'=>'label-class']) ?>

    <?= $form->field($model, 'resultado')->dropDownList(
                        ArrayHelper::map(Resultados::find()->all(), 'id_r', 'codNom'),
                        [
                            'prompt' => '-- Seleccione un Resultado --'
                        ]
            )->label('2.- Resultado',['class'=>'label-class']) ?>
    
    <?= $form->field($model, 'codigo_i')->dropDownList(['I1.' => 'I1.', 'I2.' => 'I2.', 'I3.' => 'I3.', 'I4.' => 'I4.', 'I5.' => 'I5.', 'I6.' => 'I6.', 'I7.' => 'I7.', 'I8.' => 'I8.', 'I9.' => 'I9.', 'I10.' => 'I10.'],
                                                        ['prompt' => '-- Código --']) ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 4])->label('Nombre del nuevo Indicador',['class'=>'label-class']) ?>

    <?= $form->field($model, 'fuente_verificacion')->textarea(['rows' => 2])->label('Fuentes de verificación',['class'=>'label-class']) ?>

    
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
