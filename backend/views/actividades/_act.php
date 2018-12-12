<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\CronogramaAvSearch;
use backend\models\CronogramaEjSearch;

$this->title = 'Actividades:';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list-alt"></i> <?= Html::encode($this->title) ?></h3>
    </div>
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>  <b>Lista principal de todos las Actividades</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nueva Actividad', ['actividades/createmodal', 'id_p' => $id_p], ['class' => 'btn btn-success']),
                'footer'=>true
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
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
                    'width' => '300px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '305px',
                            'white-space' => 'normal',
                            'font-weight' => 'bold',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute'=>'indicador',
                    'label' => 'Indicadores',
                    'width' => '250px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '300px',
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
                    'pageSummary'=>'Total Presupuesto ($us)',
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
                    'pageSummaryFunc' => GridView::F_SUM
                ],
                /*[
                    'attribute'=>'rrhh',
                    'label' => 'Recursos Humanos',
                    'width' => '200px', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->recursoHumano0->fullName;
                    },
                ],*/
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_a'];
                        $id_p = $data['proyecto'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['actividades/viewmodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['actividades/updatemodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['actividades/deletemodal', 'id' => $id, 'id_p' => $id_p], [
                            'class' => 'btn btn-danger',
                            'title' => 'Eliminar',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar el Indicador?',
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
