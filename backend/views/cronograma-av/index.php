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
                    'footer'=>false
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],
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
                        'filterType'=>GridView::FILTER_SELECT2,
                        'filter'=>ArrayHelper::map(Actividades::find()->orderBy('nombre')->asArray()->all(), 'id_a', 'nombre'), 
                        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear'=>true],
                        ],
                        'filterInputOptions'=>['placeholder'=>'Buscar por Indicador'],
                        'group'=>true,  // enable grouping
                        'subGroupOf'=>1 // supplier column index is the parent group
                    ],
                    [
                        'attribute' => 'ene',
                        'label' => 'Ene',
                        'width' => '60px',
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
                                                    ],
                                                ];
                                            },
                    ],
                    [
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
                    ],
                ],
            ]); ?>
        </div>
</div>