<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Actividades;
use backend\models\Objetivos;
use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="cronograma-ej-index">

    <?= GridView::widget([
            'dataProvider'=>$dataProviderEj,
            'filterModel'=>$searchModelEj,
            'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>['type'=>'info', 'heading'=>'<h4>Ejecución general de los Objetivos</h4>'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'objetivo', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '250px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->objetivo0->nombre;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Objetivos::find()->orderBy('nombre')->asArray()->all(), 'id_o', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any supplier'],
                    'group'=>true,  // enable grouping
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
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Actividades::find()->orderBy('nombre')->asArray()->all(), 'id_a', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any category'],
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
            ],
        ]); ?>
</div>