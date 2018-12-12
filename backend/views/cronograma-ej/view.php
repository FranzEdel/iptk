<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaEj */

$this->title = 'Información detallada';
$this->params['breadcrumbs'][] = ['label' => 'Cronograma', 'url' => ['index']];

?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_ce], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_ce], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar la información?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Lista Principal', ['index'], ['class' => 'btn btn-info']) ?>
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
                    'attribute' => 'actividad',
                    'value' => function($model){
                        return $model->actividad0->nombre;
                    },
                ],
                [
                    'attribute' => 'item',
                    'label' => 'Detalle del gasto',
                ],
                [
                    'attribute' => 'ene',
                    'label' => 'Enero',
                    'value' => function($model){
                        return $model->ene . ' Bs';
                    }
                ],
                [
                    'attribute' => 'feb',
                    'label' => 'Febrero',
                    'value' => function($model){
                        return $model->feb . ' Bs';
                    }
                ],
                [
                    'attribute' => 'mar',
                    'label' => 'Marzo',
                    'value' => function($model){
                        return $model->mar . ' Bs';
                    }
                ],
                [
                    'attribute' => 'abr',
                    'label' => 'Abril',
                    'value' => function($model){
                        return $model->abr . ' Bs';
                    }
                ],
                [
                    'attribute' => 'may',
                    'label' => 'Mayo',
                    'value' => function($model){
                        return $model->may . ' Bs';
                    }
                ],
                [
                    'attribute' => 'jun',
                    'label' => 'Junio',
                    'value' => function($model){
                        return $model->jun . ' Bs';
                    }
                ],
                [
                    'attribute' => 'jul',
                    'label' => 'Julio',
                    'value' => function($model){
                        return $model->jul . ' Bs';
                    }
                ],
                [
                    'attribute' => 'ago',
                    'label' => 'Agosto',
                    'value' => function($model){
                        return $model->ago . ' Bs';
                    }
                ],
                [
                    'attribute' => 'sep',
                    'label' => 'Septiembre',
                    'value' => function($model){
                        return $model->sep . ' Bs';
                    }
                ],
                [
                    'attribute' => 'oct',
                    'label' => 'Octubre',
                    'value' => function($model){
                        return $model->oct . ' Bs';
                    }
                ],
                [
                    'attribute' => 'nov',
                    'label' => 'Noviembre',
                    'value' => function($model){
                        return $model->nov . ' Bs';
                    }
                ],
                [
                    'attribute' => 'dic',
                    'label' => 'Diciembre',
                    'value' => function($model){
                        return $model->dic . ' Bs';
                    }
                ],
                [
                    'attribute' => 'total',
                    'label' => 'Total ejecutado',
                    'value' => function($model){
                        return $model->total . ' Bs';
                    },
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                        ],
                    ],
                ],
                /*[
                    'attribute' => 'actividad',
                    'label' => 'Monto presupuestado',
                    'value' => function($model){
                        return $model->actividad0->presupuestado . ' Bs';
                    }
                ],*/
            ],
        ]) ?>
    </div>        
</div>
