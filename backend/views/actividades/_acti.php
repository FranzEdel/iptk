<?php

use yii\helpers\Html;
use kartik\grid\GridView;

use backend\models\CronogramaAvSearch;
use backend\models\CronogramaEjSearch;

$this->title = 'Actividades del Indicador: ' . $indicador;
?>
<div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Nueva Actividad', ['actividades/create','id' => $id], ['class' => 'btn btn-info']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'nombre',
                //'indicador',
                /*[
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_a'];
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i> Editar', ['actividades/update', 'id' => $id], ['class' => 'btn btn-success']);
                        $btn_delete = Html::a('<i class="fa fa-remove"></i> Eliminar', ['actividades/delete', 'id' => $id], [
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
                            $url = Yii::$app->urlManager->createUrl(['actividades/view', 'id' => $model->id_a]); 
                            return $url;
                        }

                        if ($action === 'update') {
                            $url = Yii::$app->urlManager->createUrl(['actividades/update', 'id' => $model->id_a]); 
                            return $url;
                        }

                        if ($action === 'delete') {
                            $url = Yii::$app->urlManager->createUrl(['actividades/delete', 'id' => $model->id_a]); 
                            return $url;
                        }
                    },
                ],
            ],
        ]); ?>
    </div>
</div>
