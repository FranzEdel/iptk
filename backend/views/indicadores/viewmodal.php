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
            <?= Html::a('Lista Objetivos', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-info']) ?>
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
                    'attribute' => 'objetivo',
                    'label' => 'OBJETIVO',
                    'value' => function($model){
                        return $model->objetivo0->nombre;
                    }
                ],
                [
                    'attribute' => 'resultado',
                    'label' => 'RESULTADO',
                    'value' => function($model){
                        return $model->resultado0->nombre;
                    }
                ],
                [
                    'attribute' => 'nombre',
                    'label' => 'NOMBRE DEL INDICADOR',
                    'value' => function($model){
                        return $model->nombre;
                    }
                ],
            ],
        ]) ?>
    </div>
</div>