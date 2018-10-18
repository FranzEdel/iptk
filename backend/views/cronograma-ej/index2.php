<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cronograma Ejecutado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cronograma-ej-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Cronograma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
<div class="row">
    <div class="col-lg-10  text-right"><b><h4>Total:</h4></b></div>
    <div class="col-ls-2">
        <b><h4><?= CronogramaEj::instance()->getTotal();?></h4></b>
    </div>
</div>