<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\tabs\TabsX;
use yii\helpers\Url;
use backend\models\Objetivos;
use yii\widgets\Pjax;

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
                    'confirm' => '¿Está seguro que desea eliminar este Proyecto?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<i class="fa fa-list"></i> Proyectos', ['index'], ['class' => 'btn btn-info']) ?>
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
    <?php Pjax::begin(['id' => 'tabsGrid']); ?>
    <?php
        
        $contenidoObj = $this->renderAjax('../objetivos/_obj', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'id_p' => $model->id_p,
        ]);

        $contenidoGroupAv = $this->renderAjax('../cronograma-av/_avgroup', [
            'searchModelAv' => $searchModelAv,
            'dataProviderAv' => $dataProviderAv,
        ]);

        $contenidoGroupEj = $this->render('../cronograma-ej/_ejgroup', [
            'searchModelEj' => $searchModelEj,
            'dataProviderEj' => $dataProviderEj,
        ]);


        $contenidoEve = $this->render('../eventos/_eve',[
            'eventos' => $eventos,
        ]);

        $contenidoAv = $this->render('../cronograma-av/_croav', [
            'searchModelAv' => $searchModelAv,
            'dataProviderAv' => $dataProviderAv,
            'id_p' => $model->id_p,
        ]);

        $contenidoEj = $this->render('../cronograma-ej/_croej', [
            'searchModelEj' => $searchModelEj,
            'dataProviderEj' => $dataProviderEj,
            'id_p' => $model->id_p,
        ]);

        $items = [
            [
                'label'=>'<i class="fa fa-tags"></i> Objetivos',
                'content'=> $contenidoObj,
                'active'=>true,
                'id' => 'objGrid'
            ],
            [
                'label'=>'<i class="fa fa-list-alt"></i> Actividades',
                'content'=> $contenidoGroupAv,
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-pushpin"></i> Items',
                'content'=> $contenidoGroupEj,
            ],
            [
                'label'=>'<i class="fa fa-tasks"></i> Avance',
                'content'=> $contenidoAv,
            ],
            [
                'label'=>'<i class="fa fa-usd"></i> Ejecución',
                'content'=>  $contenidoEj,
            ],
            [
                'label'=>'<i class="fa fa-calendar"></i> Eventos',
                'content'=> $contenidoEve,
            ],
            [
                'label'=>'<i class="fa fa-signal"></i> Gráficas',
                'content'=> 'Graficas',
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
    <?php Pjax::end() ?>
</div>