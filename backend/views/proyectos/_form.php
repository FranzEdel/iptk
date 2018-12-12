<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Herramientas;
use backend\models\Programas;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'programa')->dropDownList(
                            ArrayHelper::map(Programas::find()->all(),'id_pr','nombre'),
                            [
                                'prompt' => '-- Programa --',
                                'onchange' => '
                                    $.post( "index.php?r=herramientas/lists&id='.'"+$(this).val(), function(data){
                                        $( "select#proyectos-herramienta" ).html( data );
                                    });
                                '
                            ]
            )->label('Programa:',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'herramienta')->dropDownList(
                                            ArrayHelper::map(Herramientas::find()->all(),'id_h','nombre'),
                                            ['prompt' => '-- Herramienta --']
            )->label('Herramienta:',['class'=>'label-class']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'codigo_p')->textInput(['maxlength' => true])->label('Código de Proyecto:',['class'=>'label-class']) ?>
        </div>
    </div>

    <?= $form->field($model, 'nombre_p')->textarea(['rows' => 2,'style'=>'text-transform:uppercase;']) ?>

    <?= $form->field($model, 'objetivo_general')->textarea(['rows' => 4, 'style'=>'text-transform:uppercase;']) ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'fecha_ini')->widget(
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
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'fecha_fin')->widget(
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
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'presupuesto')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'periodo')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'agencias')->textInput(['maxlength' => true]) ?>
    
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'estado')->dropDownList(['EJECUCIÓN' => 'EJECUCIÓN', 'CONCLUSIÓN' => 'CONCLUSIÓN'],
                                                    ['prompt' => '-- Estado --'],
                                                    ['style'=>'text-transform:uppercase;']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'municipios')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'proyecto_doc')->fileInput() ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

