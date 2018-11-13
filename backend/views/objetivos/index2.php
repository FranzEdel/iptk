<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\widgets\ActiveForm;
use backend\models\ResultadosSearch;
use yii\helpers\ArrayHelper;
use backend\models\Proyectos;

use backend\models\CronogramaEjSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjetivosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Nuevo Objetivo', ['create'], ['class' => 'btn btn-info']) ?>
        </p>
        <div class="col-lg-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column){
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column){
                        $searchModel = new CronogramaEjSearch();
                        $dataProvider = $searchModel->searchByObj(Yii::$app->request->queryParams, $model->id_o);
                        
                        return Yii::$app->controller->renderPartial('_detalle', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'id' => $searchModel->objetivo,
                            'objetivo' => $model->nombre,
                        ]);
                    },
                ],
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
                //'proyecto',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>
</div>