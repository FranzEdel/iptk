<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Objetivos;
use backend\models\Resultados;
use backend\models\Indicadores;
use backend\models\Actividades;
use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="cronograma-ej-index">

    <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            //'filterModel'=>$searchModel,
            'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>['type'=>'primary', 'heading'=>'Seguimiento en detalle al objetivo'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'resultado', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->indicador0->resultado0->nombre;
                    },
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                    'attribute'=>'indicador', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->indicador0->nombre;
                    },
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                    'attribute'=>'actividad', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->nombre;
                    },
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                    'attribute'=>'item',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'pageSummary'=>'Total Ejecutado',
                    'pageSummaryOptions'=>['class'=>'text-right'],
                ],
                [
                    'attribute'=>'total',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '150px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'hAlign'=>'right',
                    'format'=>['decimal', 2],
                    'pageSummary'=>true,
                    'pageSummaryFunc'=> GridView::F_SUM,
                ],
                [
                    'attribute'=>'presupuestado', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->presupuestado;
                    },
                ],
            ],
        ]); ?>
</div>