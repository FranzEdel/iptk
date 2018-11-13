<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Resultados;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IndicadoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indicadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
    <div class="row">
        <div class="col-lg-6">
            <p>
                <?= Html::a('<i class="fa fa-plus"></i> Nuevo Indicador', ['create'], ['class' => 'btn btn-info']) ?>
            </p>
        </div>
    </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'resultado',
                    'value' => 'resultado0.nombre',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'filter'=>ArrayHelper::map(Resultados::find()->asArray()->all(), 'id_r', 'nombre'),                
                ],
                'nombre',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
