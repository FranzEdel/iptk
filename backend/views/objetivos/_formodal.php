<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;

/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetivos-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2, 'style'=>'text-transform:uppercase;'])->label('Nombre del Objetivo',['class'=>'label-class']) ?>

    <?= $form->field($model, 'indicador')->textarea(['rows' => 2, 'style'=>'text-transform:uppercase;'])->label('Indicador del Objetivo',['class'=>'label-class']) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-save"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-remove"></i> Cancelar', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-danger']) ?>
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
            $(document).find('#modalObj').modal('hide');
            $.pjax.reload({ container:'#tabsGrid'});
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