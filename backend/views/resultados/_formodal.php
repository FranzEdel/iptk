<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Objetivos;

/* @var $this yii\web\View */
/* @var $model backend\models\Resultados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resultados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'objetivo_e')->dropDownList(
                                        ArrayHelper::map(Objetivos::find()->where(['proyecto' => $id_p])->all(),'id_o','nombre'),
                                        ['prompt' => '-- Objetivo --']
    ) ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2])->label('Nombre del Resulatdo',['class'=>'label-class']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>