<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\Actividades;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActividadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Nueva Actividad', ['create'], ['class' => 'btn btn-warning']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_a',
                'nombre',
                'indicador0.nombre',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
