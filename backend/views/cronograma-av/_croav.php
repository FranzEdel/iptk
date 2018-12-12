<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\CronogramaAv;
use backend\models\Actividades;
use yii\bootstrap\Progress;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaAvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avance general de Actividades';

?>
<div class="box box-success box-solid">
    <div class="box-header">
        <div class="row">
            <div class="col-lg-4">
                <p>
                    <h4><i class="fa fa-book"></i> Avance General del Proyecto</h4>
                </p>
            </div>
            <div class="col-lg-8">
                <div>
                    <p>
                    <?php
                        echo Progress::widget([
                            'label' => CronogramaAv::getPorGeneral($id_p),
                            'percent' => CronogramaAv::getTotalAvanceGeneral($id_p),
                            'barOptions' => ['class' => 'progress-bar-info'],
                            'options' => [
                                    'class' => 'progress-striped',
                                    'style' => [
                                        'font-weight' => 'bold',
                                        'color' => 'black',
                                    ],  
                                ]
                        ]); 
                    ?>
                    </p>
                </div>
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
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nueva Actividad', ['actividades/createmodal', 'id_p' => $id_p], ['class' => 'btn btn-success']),
                'footer'=>true
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'actividad',
                    'label' => 'Código',
                    'width' => '70px', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '100px',
                            'white-space' => 'normal',
                            'font-weight' => 'bold',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->codigo_a;
                    },
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                    'attribute' => 'actividad',
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->nombre;
                    },
                    'width' => '350px', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'ene',
                    'label' => 'Ene',
                    'width' => '80px', 
                    'value' => function($model){
                        if($model->ene == 0){
                            return 'NP';
                        } else {
                            return $model->ene . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'max-width' => '100px',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'feb',
                    'label' => 'Feb',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->feb == 0){
                            return 'NP';
                        } else {
                            return $model->feb . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'mar',
                    'label' => 'Mar',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->mar == 0){
                            return 'NP';
                        } else {
                            return $model->mar . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'abr',
                    'label' => 'Abr',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->abr == 0){
                            return 'NP';
                        } else {
                            return $model->abr . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'may',
                    'label' => 'May',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->may == 0){
                            return 'NP';
                        } else {
                            return $model->may . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'jun',
                    'label' => 'Jun',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->jun == 0){
                            return 'NP';
                        } else {
                            return $model->jun . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'ago',
                    'label' => 'Ago',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->ago == 0){
                            return 'NP';
                        } else {
                            return $model->ago . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'sep',
                    'label' => 'Sep',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->sep == 0){
                            return 'NP';
                        } else {
                            return $model->sep . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'oct',
                    'label' => 'Oct',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->oct == 0){
                            return 'NP';
                        } else {
                            return $model->oct . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'nov',
                    'label' => 'Nov',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->nov == 0){
                            return 'NP';
                        } else {
                            return $model->nov . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'dic',
                    'label' => 'Dic',
                    'width' => '80px',
                    'value' => function($model){
                        if($model->dic == 0){
                            return 'NP';
                        } else {
                            return $model->dic . '%';
                        }
                    },
                    'contentOptions' => [
                        'style' => [
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'avance',
                    'value' => function($model){
                        return "{$model->avance}%";
                    },
                    'width' => '100px',
                    'contentOptions' => function($model){
                                            return [
                                                'class' => 'progress-bar progress-bar-success progress-bar-striped',
                                                'style' => [
                                                    'width' => "{$model->avance}%",
                                                    'font-weight' => 'bold',
                                                    'color' => 'black',
                                                    'white-space' => 'normal',
                                                    'vertical-align' => 'middle',
                                                ],
                                            ];
                                        },
                ],
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_ca'];
                        $id_p = $data['proyecto'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['cronograma-av/viewmodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['cronograma-av/updatemodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['cronograma-av/deletemodal', 'id' => $id, 'id_p' => $id_p], [
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