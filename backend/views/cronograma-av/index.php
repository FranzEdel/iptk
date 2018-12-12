<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\CronogramaAv;
use backend\models\Actividades;
use yii\bootstrap\Progress;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Avance';
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
                                $.post( "index.php?r=cronograma-av/filtro&id='.'"+$(this).val());
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
                        'attribute'=>'actividad',
                        'label' => 'Actividades',
                        'width' => '400px', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->actividad0->nombre;
                        },
                    ],
                    [
                        'attribute' => 'ene',
                        'label' => 'Ene',
                        'width' => '60px',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->ene == 0){
                                return 'NP';
                            } else {
                                return $model->ene . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'feb',
                        'label' => 'Feb',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->feb == 0){
                                return 'NP';
                            } else {
                                return $model->feb . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'mar',
                        'label' => 'Mar',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->mar == 0){
                                return 'NP';
                            } else {
                                return $model->mar . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'abr',
                        'label' => 'Abr',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->abr == 0){
                                return 'NP';
                            } else {
                                return $model->abr . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'may',
                        'label' => 'May',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->may == 0){
                                return 'NP';
                            } else {
                                return $model->may . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'jun',
                        'label' => 'Jun',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->jun == 0){
                                return 'NP';
                            } else {
                                return $model->jun . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'jul',
                        'label' => 'Jul',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->jun == 0){
                                return 'NP';
                            } else {
                                return $model->jun . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'ago',
                        'label' => 'Ago',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->ago == 0){
                                return 'NP';
                            } else {
                                return $model->ago . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'sep',
                        'label' => 'Sep',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->sep == 0){
                                return 'NP';
                            } else {
                                return $model->sep . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'oct',
                        'label' => 'Oct',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->oct == 0){
                                return 'NP';
                            } else {
                                return $model->oct . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'nov',
                        'label' => 'Nov',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->nov == 0){
                                return 'NP';
                            } else {
                                return $model->nov . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'dic',
                        'label' => 'Dic',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value' => function($model){
                            if($model->dic == 0){
                                return 'NP';
                            } else {
                                return $model->dic . ' %';
                            }
                        }
                    ],
                    [
                        'attribute' => 'avance',
                        //'width' => '80px',
                        'value' => function($model){
                            $info = $model->avance;
                            return "{$info}%";
                        },
                        'contentOptions' => function($model){
                            $info = $model->avance;
                            if ( $info >= 0 and $info <= 30){
                                $clase = 'progress-bar progress-bar-danger progress-bar-striped';
                            }elseif ($info >= 31 and $info <= 75){
                                $clase = 'progress-bar progress-bar-warning progress-bar-striped';
                            }else{
                                $clase = 'progress-bar progress-bar-success progress-bar-striped';
                            }
                            return [
                                'class' => $clase,
                                'style' => [
                                    'width' => "{$model->avance}%",
                                    'font-weight' => 'bold',
                                    'vertical-align' => 'middle',
                                    'color' => 'black',
                                ],
                            ];
                        },
                    ],
                    [
                        'attribute' => 'gestion',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '100px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                    ],
                    /*[
                        'label' => 'Acciones',
                        'format' => 'raw',
                        'value' => function($data){
                            $id = $data['id_ca'];
                            $btn_view = Html::a('<i class="fa fa-eye"></i>', ['cronograma-av/view', 'id' => $id], ['class' => 'btn btn-info', 'title' => 'Ver']);
                            $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['cronograma-av/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                            $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['cronograma-av/delete', 'id' => $id], [
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