<?php

use yii\helpers\Html;
use yii\widgets\activeForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Objetivos;
use backend\models\Actividades;
use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronograma Ejecutado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'proyecto')->dropDownList(
                        ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                        [
                            'prompt' => '-- Filtrar por Proyecto --',
                            'onchange' => '
                                $.post( "index.php?r=cronograma-ej/filtro2&id='.'"+$(this).val());
                            '
                        ]
        )->label('<i class="fa fa-book"></i> Lista de Proyectos',['class'=>'label-class']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="box box-success box-solid">
    <div class="box-body">

        <?= GridView::widget([
                'dataProvider'=>$dataProvider,
                //'filterModel'=>$searchModel,
                'exportConfig' => [
                    GridView::EXCEL => 'inactive',
                    GridView::PDF => 'inactive',
                ],
                'showPageSummary'=>true,
                'pjax'=>true,
                'resizableColumns' => false,
                'responsive' => true,
                'striped'=>true,
                'hover'=>true,
                'panel'=>[
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-usd"></i>  <b>PAT de ejecución de todos los proyectos</b></h3>',
                    'type'=>'success',
                    'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['patej'], ['class' => 'btn btn-info']),
                    'footer'=>false
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                //'options' => ['style' => 'vertical-align:middle;'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],

                    /*[
                        'attribute'=>'proyecto',
                        //'width' => '250px', 
                        'contentOptions' => [
                            'style' => [
                                'font-size' => '12px',
                                'font-weight' => 'bold',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->indicador0->resultado0->objetivoE->proyecto0->nombre_p;
                        },
                        'group'=>true,  // enable grouping
                        'subGroupOf'=>1 // supplier column index is the parent group
                    ],*/
                    [
                        'attribute'=>'objetivo', 
                        'contentOptions' => [
                            'style' => [
                                'font-size' => '12px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->objetivo0->nombre;
                        },
                        'group'=>true,  // enable grouping
                        //'subGroupOf'=>1 // supplier column index is the parent group
                    ],
                    [
                        'attribute'=>'resultado',
                        'label' => 'Resultados', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
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
                        'attribute'=>'indicador', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->indicador0->nombre;
                        },
                    ],
                    [
                        'attribute'=>'actividad', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->nombre;
                        },
                    ],
                    
                    [
                        'attribute' => 'item',
                        'label' => 'Gasto',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'pageSummary'=>'Total Ejecutado',
                        'pageSummaryOptions'=>['class'=>'text-right'],
                    ],
                    [
                        'attribute'=>'actividad',
                        'label' => 'PPTO', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->presupuestado;
                        },
                        'width' => '150px',
                        'hAlign' => 'right',
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                        'pageSummaryFunc' => GridView::F_SUM
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
                    ],
                    [
                        'attribute' => 'ene',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'feb',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'mar',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'abr',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'may',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'jun',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'jul',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'ago',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'sep',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'oct',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'nov',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'dic',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],

                    ],
                    [
                        'attribute' => 'total',
                        'contentOptions' => [
                            'style' => [
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'width' => '150px',
                        'hAlign' => 'right',
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                        'pageSummaryFunc' => GridView::F_SUM
                    ],

                ],
        ]); ?>
    </div>
</div>