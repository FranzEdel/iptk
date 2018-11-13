<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Objetivos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resultados';
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
                <?= Html::a('<i class="fa fa-plus"></i> Nuevo Resultado', ['create'], ['class' => 'btn btn-info']) ?>
            </p>
        </div>
    </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_r',
                [
                    'attribute' => 'objetivo_e',
                    'value' => 'objetivoE.nombre',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                        ],
                    ],
                    'filter'=>ArrayHelper::map(Objetivos::find()->asArray()->all(), 'id_o', 'nombre'),                
                ],
                [
                    'label' => 'Nombre del Resultado',
                    'value' => function($model){
                        return $model->nombre;
                    },
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
