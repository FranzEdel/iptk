<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Objetivos;
use backend\models\Proyectos;
/* @var $this yii\web\View */
/* @var $model backend\models\Resultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'proyecto')->dropDownList(
                            ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                            [
                                'prompt' => '-- Seleccione un Proyecto --',
                                'onchange' => '
                                    $.post( "index.php?r=objetivos/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#resultados-objetivo_e" ).html( data );
                                    });
                                '
                            ]
            )->label('1.- Proyecto',['class'=>'label-class']) ?>
    
    <?= $form->field($model, 'objetivo_e')->dropDownList(
                    ArrayHelper::map(Objetivos::find()->all(), 'id_o', 'nombre'),
                    ['prompt' => '-- Objetivos --']
    )->label('2- Objetivo',['class'=>'label-class']) ?>
    
    <?= $form->field($model, 'nombre')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
