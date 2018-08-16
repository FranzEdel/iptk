<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\ActividadesSearch;


?>

<div class="indicadores-index">
    <h4>Indicadores</h4>
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
                    $searchModel = new ActividadesSearch();
                    $searchModel->indicador = $model->id_i;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_acti', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],

            'nombre',
            //'resultado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
