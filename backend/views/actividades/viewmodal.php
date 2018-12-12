<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */

$this->title = 'Información';

?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title).' detallada de la Actividad' ?></h3>
    </div>
    <div class="box-body">
    <p>
            <?= Html::a('Lista Actividades', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['updatemodal', 'id' => $model->id_a, 'id_p' => $id_p], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['deletemodal', 'id' => $model->id_a, 'id_p' => $id_p], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro que desea eliminar la Actividad?',
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
                    'attribute' => 'codigo_a',
                    'label' => 'Código',
                    'value' => function($model){
                        return $model->codigo_a;
                    }
                ],
                [
                    'attribute' => 'nombre',
                    'label' => 'Nombre de la Actividad',
                    'value' => function($model){
                        return $model->nombre;
                    }
                ],
                [
                    'attribute' => 'indicador',
                    'label' => 'Indicadores',
                    'value' => function($model){
                        return $model->indicador;
                    }
                ],
                [
                    'attribute' => 'descripcion',
                    'label' => 'Descripción',
                    'value' => function($model){
                        return $model->descripcion;
                    }
                ],
                [
                    'attribute' => 'recursos',
                    'label' => 'Recursos',
                    'value' => function($model){
                        return $model->nombre;
                    }
                ],
                [
                    'attribute' => 'presupuestado',
                    'label' => 'Costes($us)',
                    'value' => function($model){
                        return $model->presupuestado . ' $us';
                    }
                ],
                [
                    'attribute' => 'rrhh',
                    'label' => 'Recursos humanos para la Actividad',
                    'value' => function($model){
                        return $model->recursoHumano0->fullName;
                    }
                ],
                
            ],
        ]) ?>
    </div>        
</div>
