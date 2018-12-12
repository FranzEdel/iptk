<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;


$this->title = 'Resultados';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-cog"></i> <?= Html::encode($this->title) ?></h3>
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i>  <b>Lista principal de todos los Resultados</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Resultado', ['resultados/createmodal', 'id_p' => $id_p], ['class' => 'btn btn-success']),
                'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'codigo_r',
                    'label' => 'Código',
                    'width' => '70px',
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                            'max-width' => '100px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute'=>'nombre',
                    'label' => 'Resultados',
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_r'];
                        $id_p = $data['proyecto'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['resultados/viewmodal', 'id' => $id, 'id_p'=> $id_p], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['resultados/updatemodal', 'id' => $id, 'id_p'=> $id_p], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['resultados/deletemodal', 'id' => $id, 'id_p'=> $id_p], [
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
