<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\tabs\TabsX;
use yii\helpers\Url;
use backend\models\Objetivos;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyectos */

$this->title = 'Datos Generales:';
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Actualizar', ['update', 'id' => $model->id_p], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-remove"></i> Eliminar', ['delete', 'id' => $model->id_p], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_p',
                'nombre_p',
                'objetivo_general:ntext',
                [
                    'attribute' => 'fecha_ini',
                    'contentOption' => ['class' => 'col-lg-6'],
                ],
                [
                    'attribute' => 'fecha_fin',
                    'contentOption' => ['class' => 'col-lg-6'],
                ],
                'estado',
            ],
        ]) ?>
    </div>
    <div>
    <?php
        
        $contenidoObj = $this->render('_obj', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);

        $contenidoEve = $this->render('_eve',[
            'eventos' => $eventos,
        ]);

        $items = [
            [
                'label'=>'<i class="fa fa-home"></i> Objetivos',
                'content'=> $contenidoObj,
                'active'=>true
            ],
            [
                'label'=>'<i class="fa fa-user"></i> Eventos',
                'content'=> $contenidoEve,
                //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
            ],
            
        ];
        // Ajax Tabs Above
        echo TabsX::widget([
            'items'=>$items,
            'position'=>TabsX::POS_ABOVE,
            'encodeLabels'=>false
        ]);
    ?>
    </div>
</div>
