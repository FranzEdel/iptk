<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\IndicadoresSearch;
use yii\web\UrlManager;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Resultados de: ' . $objetivo;

?>

<div class="box box-danger box-solid">
    <div class="box-header">
        <p><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></p>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Nuevo Resultado', ['resultados/createmodal', 'id' => $id], ['class' => 'btn btn-info']) ?>
            <?= Html::button('<i class="fa fa-plus"></i> Nuevo Objetivo', ['value' => Url::to('index.php?r=resultados/createmodal'), 'class' => 'btn btn-info', 'id' => 'modalButtonRe']) ?>
        </p>
        <?php 
            Modal::begin([
                'header' => '<h4>Nuevo Resultado</h4>',
                'id' => 'modalRe',
                'size' => 'modal-lg',
            ]);
                echo "<div id='modalContentRe'></div>";
            Modal::end();
         ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'         => true,
            'pjaxSettings' =>[
                'neverTimeout'=>true,
                'options'=>[
                        'id'=>'reGrid',
                ]
            ], 
            'columns' => [
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column){
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column){
                        $searchModel = new IndicadoresSearch();
                        $searchModel->resultado = $model->id_r;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        
                        return Yii::$app->controller->renderPartial('../indicadores/_indi', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'id' => $searchModel->resultado,
                            'resultado' => $model->nombre,
                        ]);
                    },
                ],

                'nombre',
                //'avance',
                /*[
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_r'];
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i> Editar', ['resultados/update', 'id' => $id], ['class' => 'btn btn-success']);
                        $btn_delete = Html::a('<i class="fa fa-remove"></i> Eliminar', ['resultados/delete', 'id' => $id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar el Item?',
                                'method' => 'post',
                            ],
                        ]);
                        return Html::a($btn_edit . ' ' . $btn_delete, '#');
                    }
                ],*/

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'urlCreator' => function ($action, $model, $key, $index) {

                        if ($action === 'view') {
                            $url = Yii::$app->urlManager->createUrl(['resultados/view', 'id' => $model->id_r]); 
                            return $url;
                        }

                        if ($action === 'update') {
                            $url = Yii::$app->urlManager->createUrl(['resultados/update', 'id' => $model->id_r]); 
                            return $url;
                        }

                        if ($action === 'delete') {
                            $url = Yii::$app->urlManager->createUrl(['resultados/delete', 'id' => $model->id_r]); 
                            return $url;
                        }
                    },
                ],
            ],
        ]); ?>
    </div>
</div>
