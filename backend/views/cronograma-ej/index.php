<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
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
                                $.post( "index.php?r=cronograma-ej/filtro&id='.'"+$(this).val());
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
                'filterModel'=>$searchModel,
                'exportConfig' => [
                    GridView::EXCEL => 'inactive',
                    GridView::PDF => 'inactive',
                ],
                'showPageSummary'=>true,
                'pjax'=>true,
                'striped'=>true,
                'hover'=>true,
                'panel'=>[
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-tasks"></i>  <b>Lista principal de todas las Actividades</b></h3>',
                    'type'=>'success',
                    'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nueva Actividad', ['create'], ['class' => 'btn btn-success']),
                    'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                    //'footer'=>true
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],

                    [
                        'attribute'=>'actividad',
                        'label' => 'Código',
                        'width' => '80px', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                                'font-weight' => 'bold',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->codigo_a;
                        },
                        'group'=>true,  // enable grouping
                        'subGroupOf'=>1 // supplier column index is the parent group
                    ],
                    [
                        'attribute'=>'actividad',
                        'width' => '300px', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '350px',
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
                        'label' => 'Detalle Insumo',
                        'width' => '300px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '350px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'pageSummary'=>'Total Ejecutado',
                        'pageSummaryOptions'=>['class'=>'text-right'],
                    ],
                    /*[
                        'attribute'=>'actividad',
                        'label' => 'Presupuesto', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
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
                    ],*/
                    /*[
                        'attribute'=>'actividad',
                        'label' => 'RRHH', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->recursoHumano0->fullName;
                        },
                        'width' => '150px',
                    ],*/
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
                        'contentOptions' => function($model){
                            if($model->total > ($model->actividad0->presupuestado * 6.97)){
                                $color = 'red';
                            }else{
                                $color = 'black';
                            }
                            return [
                                'style' => [
                                    'font-weight' => 'bold',
                                    'vertical-align' => 'middle',
                                    'color' => $color,
                                ],
                            ];
                        },
                        'width' => '150px',
                        'hAlign' => 'right',
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                        'pageSummaryFunc' => GridView::F_SUM
                    ],
                    /*[
                        'label' => 'Acciones',
                        'format' => 'raw',
                        'value' => function($data){
                            $id = $data['id_ce'];
                            $btn_view = Html::a('<i class="fa fa-eye"></i>', ['cronograma-ej/view', 'id' => $id], ['class' => 'btn btn-info', 'title' => 'Ver']);
                            $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['cronograma-ej/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                            $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['cronograma-ej/delete', 'id' => $id], [
                                'class' => 'btn btn-danger',
                                'title' => 'Eliminar',
                                'data' => [
                                    'confirm' => '¿Esta seguro que desea eliminar el Item?',
                                    'method' => 'post',
                                ],
                            ]);
                            return Html::a($btn_view . ' ' .$btn_edit . ' ' . $btn_delete, '#');
                        }
                    ],*/
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'contentOptions' => [
                            'style' => [
                                'vertical-align' => 'middle',
                            ],
                        ],
                    ],
                ],
        ]); ?>
    </div>
</div>
