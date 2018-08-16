<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecursosHumanosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recursos Humanos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recursos-humanos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Recursos Humanos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rh',
            'nombres',
            'apellidos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
