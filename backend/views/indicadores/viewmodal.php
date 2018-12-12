<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Indicadores */

$this->title = 'Información';

?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-leaf"></i> <?= Html::encode($this->title) . ' detallada del Indicador:' ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Lista Indicadores', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['updatemodal', 'id' => $model->id_i, 'id_p' => $id_p], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['deletemodal', 'id' => $model->id_i, 'id_p' => $id_p], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro que desea eliminar el Indicador?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'resultado',
                    'label' => 'Resultado',
                    'value' => function($model){
                        return $model->resultado0->nombre;
                    }
                ],
                [
                    'attribute' => 'codigo_i',
                    'label' => 'Código',
                    'value' => function($model){
                        return $model->codigo_i;
                    }
                ],
                [
                    'attribute' => 'nombre',
                    'label' => 'Indicador anual de Resultado',
                    'value' => function($model){
                        return $model->nombre;
                    }
                ],
                [
                    'attribute' => 'medio_verificacion',
                    'label' => 'Medio de Verificación',
                    'value' => function($model){
                        return $model->fuente_verificacion;
                    }
                ],
            ],
        ]) ?>
    </div>
</div>