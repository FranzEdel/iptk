<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HerramientasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Herramientas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'exportConfig' => [
                GridView::EXCEL => 'inactive',
                GridView::PDF => 'inactive',
            ],
            'pjax'=>true,
            'pjaxSettings' => [
                'options' => [
                    'enablePushState' => false,
                ],
            ],
            'striped'=>true,
            'hover'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i>  <b>Lista de Herramientas</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nueva Herramienta', ['create'], ['class' => 'btn btn-success']),
                'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                //'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute' => 'programa',
                    'label' => 'Programas',
                    'width' => '150px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'font-weight' => 'bold',
                        ],
                    ],
                    'value' => function($model){
                        return $model->programa0->nombre;
                    },
                    'hAlign'=>'center',
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                'nombre',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
