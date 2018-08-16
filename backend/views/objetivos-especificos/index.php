<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\ObjetivosEspecificosDetallesSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjetivosEspecificosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos Especificos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivos-especificos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Objetivos Especificos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                    $searchModel = new ObjetivosEspecificosDetallesSearch();
                    $searchModel->objetivo_esp = $model->id_oe;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_oed', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
            //'id_oe',
            'nombre:ntext',
            //'proyecto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
