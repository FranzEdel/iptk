<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use yii\bootstrap\Progress;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Eventos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= \yii2fullcalendar\yii2fullcalendar::widget([
                'options' => [
                  'lang' => 'es',
                ],
                'events' => $eventos
              ]);
    ?>
    
    <?php Pjax::end(); ?>
</div>
<div>
    <?php
         echo Progress::widget([
            'bars' => [
                ['percent' => 30, 'options' => ['class' => 'progress-bar-danger']],
                ['percent' => 30, 'label' => 'test', 'options' => ['class' => 'progress-bar-success']],
                ['percent' => 40, 'options' => ['class' => 'progress-bar-warning']],
    ]
        ]); 
    ?>
</div>
