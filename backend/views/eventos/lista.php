<?php

use yii\helpers\Html;
use yii\grid\GridView;

use backend\models\Eventos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ActividadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> Listado de todos los <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Nuevo Evento', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Ir a calendario', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_a',
                'titulo',
                [
                    'attribute' => 'descripcion',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                'fecha_creacion',
                [
                    'attribute' => 'proyecto0.nombre_p',
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
