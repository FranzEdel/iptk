<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'objetivo_general')->textarea(['rows' => 6]) ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'fecha_ini')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'fecha_fin')->textInput() ?>
        </div>
    </div>
    
    <?= $form->field($model, 'estado')->dropDownList(['EJECUCIÓN' => 'EJECUCIÓN', 'CONCLUSIÓN' => 'CONCLUSIÓN'],
                                                    ['prompt' => '-- Estado --']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
