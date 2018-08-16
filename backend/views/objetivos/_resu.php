<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\IndicadoresSearch;

?>
<div class="resultados-index">
    <h4>Resultados</h4>
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
                    $searchModel = new IndicadoresSearch();
                    $searchModel->resultado = $model->id_r;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_indi', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],

            'nombre',
            //'avance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
