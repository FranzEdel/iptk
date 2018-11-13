<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronograma Ejecutado';

?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <div class="row">
            <div class="col-lg-6">
                <p>
                    <h4><i class="fa fa-book"></i> Monto total ejecutado en el Proyecto: <b><?= CronogramaEj::instance()->getTotalPro($id_p);?></b></h4>
                </p>
            </div>
        </div>
    </div>
    <div class="box-body">

        <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'exportConfig' => [
                GridView::EXCEL => 'inactive',
                GridView::PDF => 'inactive',
            ],
            //'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>  <b>Lista principal de todos las Actividades</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nueva Gasto', ['cronograma-ej/createmodal', 'id_p' => $id_p], ['class' => 'btn btn-success']),
                'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class'=>'kartik\grid\SerialColumn'],

                [
                    'attribute' => 'actividad',
                    'value' => 'actividad0.nombre',
                    'width' => '250px', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ],
                    ],
                ],
                [
                    'attribute' => 'item',
                    'label' => 'Gasto',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '150px',
                            'font-weight' => 'bold',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ],
                    ],
                ],
                [
                    'attribute' => 'ene',
                    'label' => 'Ene',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'feb',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'mar',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'abr',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'may',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'jun',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'jul',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'ago',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'sep',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'oct',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'nov',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'dic',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute' => 'total',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ]
                    ]
                ],
                [
                    'attribute'=>'presupuestado',
                    'label' => 'Presupuesto',
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'text-align' => 'center',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->presupuestado;
                    },
                ],
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_ce'];
                        $id_p = $data['proyecto'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['cronograma-ej/viewmodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['cronograma-ej/updatemodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['cronograma-ej/deletemodal', 'id' => $id, 'id_p' => $id_p], [
                            'class' => 'btn btn-danger',
                            'title' => 'Eliminar',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar la Actividad?',
                                'method' => 'post',
                            ],
                        ]);
                        return Html::a($btn_view . ' ' .$btn_edit . ' ' . $btn_delete, '#');
                    },
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
