<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\EventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Nuevo Evento', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Todos los Eventos', ['lista'], ['class' => 'btn btn-warning']) ?>
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
</div>
