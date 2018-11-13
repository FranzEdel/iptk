<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\ResultadosSearch;
use yii\helpers\ArrayHelper;
use backend\models\Indicadores;

use yii\web\UrlManager;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjetivosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos';
?>

<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
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
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-tags"></i><b> Lista principal de todos los Objetivos</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Objetivo', ['objetivos/createmodal', 'id_p' => $id_p], ['class' => 'btn btn-success']),
                'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute' => 'nombre',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '600px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                [
                    'attribute' => 'indicador',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '600px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_o'];
                        $id_p = $data['proyecto'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['objetivos/viewmodal', 'id' => $id, 'id_p'=> $id_p], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['objetivos/updatemodal', 'id' => $id, 'id_p'=> $id_p], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['objetivos/deletemodal', 'id' => $id, 'id_p'=> $id_p], [
                            'class' => 'btn btn-danger',
                            'title' => 'Eliminar',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar el Objetivo?',
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
