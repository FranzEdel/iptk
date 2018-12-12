<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */

$this->title = 'Información';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title).' detallada de la Actividad' ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('Lista Actividades', ['index'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_a], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_a], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Seguro que desea eliminar esta actividad?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'proyecto',
                    'label' => 'Proyecto',
                    'value' => function($model){
                        return $model->proyecto0->nombre_p;
                    }
                ],
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
