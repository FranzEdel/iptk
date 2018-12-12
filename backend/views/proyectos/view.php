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
            <?= Html::a('<i class="glyphicon glyphicon-import"></i> Descargar Documento', ['download', 'id' => $model->id_p], ['class' => 'btn btn-warning']) ?>
        </p>
        
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'label' => 'Herramienta',
                    'value' => function($model){
                        return $model->herramienta0->nombre;
                    },
                ],
                'codigo_p',
                'nombre_p',
                'objetivo_general:ntext',
                [
                    'attribute' => 'fecha_ini',
                    'label' => 'Fecha inicio',
                ],
                [
                    'attribute' => 'fecha_fin',
                    'label' => 'Fecha Fín',
                ],
                [
                    'attribute' => 'presupuesto',
                    'label' => 'Presupuesto (Bs)',
                    'value' => function($model){
                        return number_format($model->presupuesto, 2) . ' Bs';
                    },
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                        ],
                    ],
                ],
                [
                    'label' => 'Presupuesto ($us)',
                    'value' => function($model){
                        return number_format(($model->presupuesto / 6.97), 2) . ' $us';
                    },
                    'contentOptions' => [
                        'style' => [
                            'font-weight' => 'bold',
                        ],
                    ],
                ],
                'documento',
                'periodo',
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
            'id_p' => $model->id_p,
        ]);

        $contenidoRe = $this->renderAjax('../resultados/_res', [
            'searchModel' => $searchModelRe,
            'dataProvider' => $dataProviderRe,
            'id_p' => $model->id_p,
        ]);

        $contenidoIn = $this->renderAjax('../indicadores/_ind', [
            'searchModel' => $searchModelIn,
            'dataProvider' => $dataProviderIn,
            'id_p' => $model->id_p,
        ]);

        $contenidoAc = $this->renderAjax('../actividades/_act', [
            'searchModel' => $searchModelAc,
            'dataProvider' => $dataProviderAc,
            'id_p' => $model->id_p,
        ]);

        $contenidoAv = $this->render('../cronograma-av/_croav', [
            'searchModel' => $searchModelAv,
            'dataProvider' => $dataProviderAv,
            'id_p' => $model->id_p,
        ]);

        $contenidoEj = $this->render('../cronograma-ej/_croej', [
            'searchModel' => $searchModelEj,
            'dataProvider' => $dataProviderEj,
            'id_p' => $model->id_p,
        ]);

        $contenidoGroupAv = $this->renderAjax('../cronograma-av/_avgroup', [
            'searchModel' => $searchModelAv,
            'dataProvider' => $dataProviderAv,
            'id_p' => $model->id_p,
        ]);

        $contenidoGroupEj = $this->render('../cronograma-ej/_ejgroup', [
            'searchModelEj' => $searchModelEj,
            'dataProviderEj' => $dataProviderEj,
            'id_p' => $model->id_p,
        ]);


        $contenidoEve = $this->render('../eventos/_eve',[
            'eventos' => $eventos,
        ]);

        

        $items = [
            [
                'label'=>'<i class="fa fa-tags"></i> Objetivos',
                'content'=> $contenidoObj,
                'active' => true,
            ],
            [
                'label'=>'<i class="fa fa-cog"></i> Resultados',
                'content'=> $contenidoRe,
            ],
            [
                'label'=>'<i class="fa fa-leaf"></i> Indicadores',
                'content'=> $contenidoIn,
            ],
            [
                'label'=>'<i class="fa fa-list-alt"></i> Actividades',
                'content'=> $contenidoAc,
            ],
            [
                'label'=>'<i class="fa fa-tasks"></i> Avance',
                'content'=> $contenidoAv,
            ],
            [
                'label'=>'<i class="fa fa-usd"></i> Ejecución',
                'content'=>  $contenidoEj,
            ],
            /*[
                'label'=>'<i class="glyphicon glyphicon-tasks"></i> PAT Avance',
                'content'=> $contenidoGroupAv,
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-pushpin"></i> PAT Ejecución',
                'content'=> $contenidoGroupEj,
            ],*/
            [
                'label'=>'<i class="fa fa-calendar"></i> Eventos',
                'content'=> $contenidoEve,
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