<?php

use yii\helpers\Html;
use kartik\grid\GridView;


use backend\models\IndicadoresSearch;

$this->title = 'Resultados de: ' . $objetivo;

?>

<div class="box box-danger box-solid">
    <div class="box-header">
        <p><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></p>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Nuevo Resultado', ['resultados/create', 'id' => $id], ['class' => 'btn btn-info']) ?>
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
                        $searchModel = new IndicadoresSearch();
                        $searchModel->resultado = $model->id_r;
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        
                        return Yii::$app->controller->renderPartial('_indi', [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                            'id' => $searchModel->resultado,
                            'resultado' => $model->nombre,
                        ]);
                    },
                ],

                'nombre',
                //'avance',
                [
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
                ],

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
