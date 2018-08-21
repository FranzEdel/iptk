<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proyectos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_p',
            [
                'attribute' => 'nombre_p',
                'contentOptions' => [
                    'style' => [
                        'max-width' => '400px',
                        'white-space' => 'normal',
                    ],
                ],
            ],
            [
                'attribute' => 'objetivo_general',
                'contentOptions' => [
                    'style' => [
                        'max-width' => '700px',
                        'white-space' => 'normal',
                    ],
                ],
            ],
            
            'fecha_ini',
            'fecha_fin',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
