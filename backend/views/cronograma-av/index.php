<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\CronogramaAv;

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
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_ca',
            [
                'attribute' => 'ene',
                'label' => 'Ene',
                'value' => function($model){
                    if($model->ene == 0){
                        return 'NP';
                    } else {
                        return $model->ene . ' %';
                    }
                }
            ],
            [
                'attribute' => 'feb',
                'label' => 'Feb',
                'value' => function($model){
                    if($model->feb == 0){
                        return 'NP';
                    } else {
                        return $model->feb . ' %';
                    }
                }
            ],
            [
                'attribute' => 'mar',
                'label' => 'Mar',
                'value' => function($model){
                    if($model->mar == 0){
                        return 'NP';
                    } else {
                        return $model->mar . ' %';
                    }
                }
            ],
            [
                'attribute' => 'abr',
                'label' => 'Abr',
                'value' => function($model){
                    if($model->abr == 0){
                        return 'NP';
                    } else {
                        return $model->abr . ' %';
                    }
                }
            ],
            [
                'attribute' => 'may',
                'label' => 'May',
                'value' => function($model){
                    if($model->may == 0){
                        return 'NP';
                    } else {
                        return $model->may . ' %';
                    }
                }
            ],
            [
                'attribute' => 'jun',
                'label' => 'Jun',
                'value' => function($model){
                    if($model->jun == 0){
                        return 'NP';
                    } else {
                        return $model->jun . ' %';
                    }
                }
            ],
            [
                'attribute' => 'ago',
                'label' => 'Ago',
                'value' => function($model){
                    if($model->ago == 0){
                        return 'NP';
                    } else {
                        return $model->ago . ' %';
                    }
                }
            ],
            [
                'attribute' => 'sep',
                'label' => 'Sep',
                'value' => function($model){
                    if($model->sep == 0){
                        return 'NP';
                    } else {
                        return $model->sep . ' %';
                    }
                }
            ],
            [
                'attribute' => 'oct',
                'label' => 'Oct',
                'value' => function($model){
                    if($model->oct == 0){
                        return 'NP';
                    } else {
                        return $model->oct . ' %';
                    }
                }
            ],
            [
                'attribute' => 'nov',
                'label' => 'Nov',
                'value' => function($model){
                    if($model->nov == 0){
                        return 'NP';
                    } else {
                        return $model->nov . ' %';
                    }
                }
            ],
            [
                'attribute' => 'dic',
                'label' => 'Dic',
                'value' => function($model){
                    if($model->dic == 0){
                        return 'NP';
                    } else {
                        return $model->dic . ' %';
                    }
                }
            ],
            'total',
            //'recursos_h',
            //'actividad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<div>
    <?= CronogramaAv::instance()->getAvance(); ?>
</div>