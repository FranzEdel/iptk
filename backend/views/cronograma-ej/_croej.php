<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronograma Ejecutado';

?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h4><i class="fa fa-usd"></i> <?= Html::encode($this->title) ?></h4>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">
                <p>
                    <?= Html::a('<i class="fa fa-plus"></i> Nuevo Item', ['cronograma-ej/create'], ['class' => 'btn btn-info']) ?>
                </p>
            </div>
            <div class="col-lg-6 text-right">
                <h4><b>Total Ejecutado:  <?= CronogramaEj::instance()->getTotalPro($id_p);?></b></h4>
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProviderEj,
            //'filterModel' => $searchModelEj,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_ce',
                [
                'attribute' => 'item',
                'contentOptions' => [
                    'style' => [
                        'max-width' => '150px',
                        'white-space' => 'normal',
                    ],
                ],
                ],
                //'item',
                'ene',
                'feb',
                'mar',
                'abr',
                'may',
                'jun',
                'jul',
                'ago',
                'sep',
                'oct',
                'nov',
                'dic',
                [
                    'attribute' => 'total',
                    'format'=>['decimal', 2],
                    'contentOptions' => [
                        'style' => ['font-weight' => 'bold']
                    ]
                ],
                //'recursos_h',
                //'actividad',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-10  text-right"><b><h4>Total:</h4></b></div>
    <div class="col-ls-2">
        <b><h4><?= CronogramaEj::instance()->getTotalPro($id_p);?></h4></b>
    </div>
</div>