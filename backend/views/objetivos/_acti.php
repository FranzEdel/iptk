<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\CronogramaAvSearch;
use backend\models\CronogramaEjSearch;

?>
<div class="actividades-index">
    <h4>Actividades</h4>
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
                    $searchModelAv = new CronogramaAvSearch();
                    $searchModelAv->actividad = $model->id_a;
                    $dataProviderAv = $searchModelAv->search(Yii::$app->request->queryParams);

                    $searchModelEj = new CronogramaEjSearch();
                    $searchModelEj->actividad = $model->id_a;
                    $dataProviderEj = $searchModelEj->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_crono', [
                        'searchModelAv' => $searchModelAv,
                        'dataProviderAv' => $dataProviderAv,
                        'searchModelEj' => $searchModelEj,
                        'dataProviderEj' => $dataProviderEj,
                    ]);
                },
            ],

            'nombre',
            //'indicador',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
