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

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'objetivo_e')->dropDownList(
                                        ArrayHelper::map(Objetivos::find()->all(),'id_o','nombre'),
                                        ['prompt' => '-- Objetivo --']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i>Cancelar</button>
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
            $(document).find('#modalRe').modal('hide');
            $.pjax.reload({ container:'#tabasGrid'});
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