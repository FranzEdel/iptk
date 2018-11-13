<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\ActividadesSearch;

$this->title = 'Indicadores:';
?>

<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-leaf"></i> <?= Html::encode($this->title) ?></h3>
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-leaf"></i>  <b>Lista principal de todos los Resultados</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Indicador', ['indicadores/createmodal', 'id_p' => $id_p], ['class' => 'btn btn-success']),
                'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'resultado',
                    'label' => 'Resulatdosss',
                    'width' => '400px', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
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
                    'attribute'=>'nombre',
                    'label' => 'Indicadores',
                    'width' => '400px', 
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->nombre;
                    },
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_i'];
                        $id_p = $data['proyecto'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['indicadores/viewmodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['indicadores/updatemodal', 'id' => $id, 'id_p' => $id_p], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['indicadores/deletemodal', 'id' => $id, 'id_p' => $id_p], [
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
