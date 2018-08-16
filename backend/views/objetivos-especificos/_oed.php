<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\ObjetivosEspecificosDetalles;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjetivosEspecificosDetallesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos Especificos Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivos-especificos-detalles-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_oed',
            'indicador:ntext',
            'verificador:ntext',
            'observaciones:ntext',
            [
                'attribute' => 'avance',
                'value' => 'avancepor',
                'contentOptions' => function($model){
                                        return [
                                            'class' => 'progress-bar progress-bar-success',
                                            'style' => [
                                                'width' => "{$model->avance}%"
                                            ],
                                        ];
                                    },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
