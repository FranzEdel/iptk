<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\ResultadosSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjetivosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Objetivos', ['create'], ['class' => 'btn btn-success']) ?>
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
