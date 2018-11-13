<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::button('Nuevo Proyecto', ['value' => Url::to('index.php?r=proyectos/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
        </p>
        <?php 
            Modal::begin([
                //'header' => '<h4>Nuevo Proyecto</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
                echo "<div id='modalContent'></div>";
            Modal::end();
         ?>
        
        <?php Pjax::begin(['id' => 'proyectosGrid']); ?>
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
                [
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_p'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['proyectos/view', 'id' => $id], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['proyectos/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['proyectos/delete', 'id' => $id], [
                            'class' => 'btn btn-danger',
                            'title' => 'Eliminar',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar el Item?',
                                'method' => 'post',
                            ],
                        ]);
                        return Html::a($btn_view . ' ' .$btn_edit . ' ' . $btn_delete, '#');
                    }
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
