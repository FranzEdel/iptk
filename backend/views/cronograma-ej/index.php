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
                        'attribute' => 'item',
                        'label' => 'Gasto',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '150px',
                                'white-space' => 'normal',
                            ],
                        ],
                        'pageSummary'=>'Total Ejecutado',
                        'pageSummaryOptions'=>['class'=>'text-right'],
                    ],
                    [
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
                    ],
                    [
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
                    ],
                    'ene',
                    'feb',
                    'mar',
                    'abr',
                    'may',
                    'jun',
                    'jul',
                    'ago',
                    'sep',
                    'oct',
                    'nov',
                    'dic',
                    [
                        'attribute' => 'total',
                        'contentOptions' => [
                            'style' => ['font-weight' => 'bold']
                        ],
                        'width' => '150px',
                        'hAlign' => 'right',
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                        'pageSummaryFunc' => GridView::F_SUM
                    ],
                    [
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
                    ],

                ],
        ]); ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-10  text-right"><b><h4>Total:</h4></b></div>
    <div class="col-ls-2">
        <b><h4><?= CronogramaEj::instance()->getTotal();?></h4></b>
    </div>
</div>