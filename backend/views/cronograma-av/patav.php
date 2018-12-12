<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Objetivos;
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
                                $.post( "index.php?r=cronograma-av/filtro2&id='.'"+$(this).val());
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
                'striped'=>true,
                'hover'=>true,
                'panel'=>[
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-tasks"></i>  <b>Lista principal de todas las Actividades</b></h3>',
                    'type'=>'success',
                    'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['patav'], ['class' => 'btn btn-info']),
                    //'footer'=>false
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],
                    [
                        'attribute'=>'proyecto',
                        'label' => 'Proyectos', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                                'font-weight' => 'bold',
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
                        'subGroupOf'=>1
                    ],
                    [
                        'attribute'=>'actividad',
                        'label' => 'Actividades', 
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
                        'attribute' => 'ene',
                        'label' => 'Ene',
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
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
                        'width' => '85px',
                        'value' => function($model){
                            return "{$model->avance}%";
                        },
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
                ],
            ]); ?>
        </div>
</div>