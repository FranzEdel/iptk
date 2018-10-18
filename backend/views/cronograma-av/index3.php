<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Actividades;
use backend\models\Objetivos;
use backend\models\CronogramaAv;
use yii\bootstrap\Progress;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaAvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avance de Cronograma';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cronograma-av-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cronograma Av', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>['type'=>'primary', 'heading'=>'Avance general de los Objetivos'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute'=>'objetivo', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '250px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->objetivo0->nombre;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Objetivos::find()->orderBy('nombre')->asArray()->all(), 'id_o', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any supplier'],
                    'group'=>true,  // enable grouping
                ],
                [
                    'attribute'=>'actividad', 
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->actividad0->nombre;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(Actividades::find()->orderBy('nombre')->asArray()->all(), 'id_a', 'nombre'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'Any category'],
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1, // supplier column index is the parent group
                ],
                [
                    'attribute' => 'avance',
                    'value' => function($model){
                        return "{$model->avance}%";
                    },
                    'contentOptions' => function($model){
                                            return [
                                                'class' => 'progress-bar progress-bar-success progress-bar-striped',
                                                'style' => [
                                                    'width' => "{$model->avance}%",
                                                    'font-weight' => 'bold',
                                                    'color' => 'black',
                                                ],
                                            ];
                                        },
                    
                ],
            ],
        ]); ?>
</div>