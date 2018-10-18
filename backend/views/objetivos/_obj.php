<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\ResultadosSearch;
use yii\helpers\ArrayHelper;
use backend\models\Indicadores;

use yii\web\UrlManager;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjetivosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos';
?>


<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::button('<i class="fa fa-plus"></i> Nuevo Objetivo', ['value' => Url::to('index.php?r=objetivos/createmodal'), 'class' => 'btn btn-info', 'id' => 'modalButtonObj']) ?>
        </p>
        <?php 
            Modal::begin([
                //'header' => '<h4>Nuevo Proyecto</h4>',
                'id' => 'modalObj',
                'size' => 'modal-lg',
            ]);
                echo "<div id='modalContentObj'></div>";
            Modal::end();
         ?>
        
        
        <div class="col-lg-12">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'         => true,
            'pjaxSettings' =>[
                'neverTimeout'=>true,
                'options'=>[
                        'id'=>'objGrid',
                ]
            ], 
            'columns' => [
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column){
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column){
                        $searchModel = new ResultadosSearch();
                        $searchModel->objetivo_e = $model->id_o;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        $indicadores = Indicadores::find()->where(['resultado' => $searchModel->id_r])->all();
                       
                        return Yii::$app->controller->renderPartial('../resultados/_resu', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'id' => $searchModel->objetivo_e,
                            'objetivo' => $model->nombre,
                        ]);
                    },
                ],
                [
                    'attribute' => 'nombre',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '600px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                [
                    'attribute' => 'indicador',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '600px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                //'proyecto',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'class' => 'pjax-update-link',
                                'delete-url' => $url,
                                'pjax-container' => 'proyectosGrid',
                                'title' => Yii::t('yii', 'Update'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a(
                                Yii::t('yii', '<span class="glyphicon glyphicon-trash"></span>'), 
                                
                                ['objetivos/deletemodel','id' => $model->id_o, 'id_p' => $model->proyecto],
                                [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'onclick' => "
                                        if (confirm('¿Esta seguro de eliminar el Objetivo?')) {
                                            $.ajax('$url', {
                                                type: 'POST'
                                            }).done(function(data) {
                                                $.pjax.reload({container: '#objGrid', url: $('#tabsGrid li.active a').attr('href')});
                                            });
                                        }
                                        return false;
                                    ",
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
        </div>
    </div>
</div>
