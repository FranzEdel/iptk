<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Actividades;
use backend\models\Resultados;
use backend\models\Indicadores;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Actividades';
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
                                $.post( "index.php?r=actividades/filtro&id='.'"+$(this).val());
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
                    'attribute'=>'resultado',
                    'label' => 'Resultados',
                    'width' => '250px', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '300px',
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
                    'attribute'=>'codigo_a',
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
                ],
                [
                    'attribute'=>'nombre',
                    'label' => 'Nombre de la Actividad',
                    'width' => '350px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'font-weight' => 'bold',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute'=>'indicador',
                    'label' => 'Indicadores',
                    'width' => '300px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '350px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute'=>'recursos',
                    'label' => 'Recursos',
                    'width' => '300px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '350px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'pageSummary'=>'Total Presupuesto ($us), (Bs)',
                    'pageSummaryOptions'=>['class'=>'text-right'],
                ],
                [
                    'attribute'=>'presupuestado',
                    'label' => 'Costo($us)',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '100px',
                            'white-space' => 'normal',
                            'font-weight' => 'bold',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign' => 'right',
                    'format' => ['decimal', 2],
                    'pageSummary' => true,
                    'pageSummaryFunc' => GridView::F_SUM,
                ],
                [
                    'label' => 'Costo(Bs)',
                    'value' => function($model){
                        return $model->presupuestado * 6.97;
                    },
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '100px',
                            'white-space' => 'normal',
                            'font-weight' => 'bold',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign' => 'right',
                    'format' => ['decimal', 2],
                    'pageSummary' => true,
                    'pageSummaryFunc' => GridView::F_SUM,
                ],
                /*[
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_a'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['actividades/view', 'id' => $id], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['actividades/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['actividades/delete', 'id' => $id], [
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