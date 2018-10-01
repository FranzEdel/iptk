<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\ResultadosSearch;
use yii\helpers\ArrayHelper;
use backend\models\Proyectos;

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
            <?= Html::a('<i class="fa fa-plus"></i> Nuevoo Objetivo', ['objetivos/create'], ['class' => 'btn btn-info']) ?>
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
                        $searchModel = new ResultadosSearch();
                        $searchModel->objetivo_e = $model->id_o;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        
                        return Yii::$app->controller->renderPartial('_resu', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'id' => $searchModel->objetivo_e,
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
