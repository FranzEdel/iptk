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
<div class="box box-success box-solid">
    <div class="box-body">

        <?= GridView::widget([
                'dataProvider'=>$dataProviderEj,
                'filterModel'=>$searchModelEj,
                'exportConfig' => [
                    GridView::EXCEL => 'inactive',
                    GridView::PDF => 'inactive',
                ],
                'responsiveWrap' => true,
                'showPageSummary'=>true,
                'pjax'=>true,
                'striped'=>true,
                'hover'=>true,
                'panel'=>[
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-tasks"></i>  <b>Ejecución presupuestaria de las Actividades del Proyecto</b></h3>',
                    'type'=>'success',
                    //'footer'=>true
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],
                    [
                        'attribute'=>'proyecto', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '250px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->proyecto0->nombre_p;
                        },
                        'group'=>true,  // enable grouping
                    ],
                    [
                        'attribute'=>'resultado', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '250px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->resultado0->nombre;
                        },
                        'group'=>true,  // enable grouping
                        'subGroupOf'=>1 // supplier column index is the parent group

                    ],
                    [
                        'attribute'=>'actividad', 
                        'label' => 'Actividades',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->nombre;
                        },
                    ],
                    [
                        'attribute'=>'item',
                        'label' => 'Gasto',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'pageSummary'=>'Totales',
                        'pageSummaryOptions'=>['class'=>'text-right'],
                    ],
                    [
                        'attribute'=>'ene',
                        'label' => 'Ene',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'feb',
                        'label' => 'Feb',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'mar',
                        'label' => 'Mar',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'abr',
                        'label' => 'Abr',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'may',
                        'label' => 'May',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'jun',
                        'label' => 'Jun',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'jul',
                        'label' => 'Jul',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'ago',
                        'label' => 'Ago',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'sep',
                        'label' => 'Sep',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'oct',
                        'label' => 'Oct',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'nov',
                        'label' => 'Nov',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'dic',
                        'label' => 'Dic',
                        'width' => '65px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                    ],
                    [
                        'attribute'=>'total',
                        'label' => 'Total',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'hAlign'=>'center',
                        'format'=>['decimal', 2],
                        'pageSummary'=>true,
                        'pageSummaryFunc'=> GridView::F_SUM,
                    ],
                    [
                        'attribute'=>'presupuestdao', 
                        'label' => 'PPTO',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->presupuestado;
                        },
                        'hAlign'=>'center',
                        'format'=>['decimal', 2],
                        'pageSummary'=>true,
                        'pageSummaryFunc'=> GridView::F_SUM,
                    ],
                    [
                        'attribute'=>'actividad',
                        'label' => 'RRHH', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->recursoHumano0->fullName;
                        },
                        'width' => '150px',
                    ],
                ],
            ]); ?>
        </div>
</div>