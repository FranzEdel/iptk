<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'nombre_p')->textInput(['maxlength' => true,'style'=>'text-transform:uppercase;']) ?>

    <?= $form->field($model, 'objetivo_general')->textarea(['rows' => 6, 'style'=>'text-transform:uppercase;']) ?>

    <div class="row">
        <div class="col-lg-6">
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
        <div class="col-lg-6">
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
    </div>
    
    <?= $form->field($model, 'estado')->dropDownList(['EJECUCIÓN' => 'EJECUCIÓN', 'CONCLUSIÓN' => 'CONCLUSIÓN'],
                                                    ['prompt' => '-- Estado --'],
                                                    ['style'=>'text-transform:uppercase;']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$script = <<< JS

$('form#{$model->formName()}').on('beforeSubmit', function(e){
    var \$form = $(this);
    $.post(
        \$form.attr("action"), //serialize Yii2 form 
        \$form.serialize()
    )
    .done(function(result){
        result =  jQuery.parseJSON(result);
        if(result.status == 'Success'){
            $(\$form).trigger("reset");
            $(document).find('#modal').modal('hide');
            $.pjax.reload({container:'#proyectosGrid'});
        }else{
            $(\$form).trigger("reset");
            $("#message").html(result.message);
        }
    })
    .fail(function(){
        console.log("server error");
    });

    return false;
});

JS;
$this->registerJS($script);
?>