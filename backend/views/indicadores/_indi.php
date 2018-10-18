<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\ActividadesSearch;

$this->title = 'Indicadores de: ' . $resultado;
?>

<div class="box box-warning box-solid">
    <div class="box-header">
        <p><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></p>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Nuevo Indicador', ['indicadores/create','id' => $id], ['class' => 'btn btn-info']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'kartik\grid\ExpandRowColumn',
                    'value' => function ($model, $key, $index, $column){
                        return GridView::ROW_COLLAPSED;
                    },
                    'detail' => function ($model, $key, $index, $column){
                        $searchModel = new ActividadesSearch();
                        $searchModel->indicador = $model->id_i;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        
                        return Yii::$app->controller->renderPartial('../actividades/_acti', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'id' => $searchModel->indicador,
                            'indicador' => $model->nombre,

                        ]);
                    },
                ],

                'nombre',
                //'resultado',
                /*[
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_i'];
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i> Editar', ['indicadores/update', 'id' => $id], ['class' => 'btn btn-success']);
                        $btn_delete = Html::a('<i class="fa fa-remove"></i> Eliminar', ['indicadores/delete', 'id' => $id], [
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
                            $url = Yii::$app->urlManager->createUrl(['indicadores/view', 'id' => $model->id_i]); 
                            return $url;
                        }

                        if ($action === 'update') {
                            $url = Yii::$app->urlManager->createUrl(['indicadores/update', 'id' => $model->id_i]); 
                            return $url;
                        }

                        if ($action === 'delete') {
                            $url = Yii::$app->urlManager->createUrl(['indicadores/delete', 'id' => $model->id_i]); 
                            return $url;
                        }
                    },
                ],
            ],
        ]); ?>
    </div>
</div>
