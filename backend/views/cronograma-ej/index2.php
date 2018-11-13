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

$this->title = 'Cronograma Ejecutado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cronograma-ej-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Cronograma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>['type'=>'primary', 'heading'=>'Ejecución general de los Objetivos'],
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
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Resultados::find()->orderBy('nombre')->asArray()->all(), 'id_r', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any category'],
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
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Indicadores::find()->orderBy('nombre')->asArray()->all(), 'id_i', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any category'],
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
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Actividades::find()->orderBy('nombre')->asArray()->all(), 'id_a', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Actividades'],
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