<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\bootstrap\Tabs;

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
                'fecha_ini',
                'fecha_fin',
                'estado',
            ],
        ]) ?>
    </div>
    <div>
    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Objetivos',
                'content' => $this->render('_obj', ['model' => $model->id_p]),
                'active' => true
            ],
            [
                'label' => 'Actividades',
                'content' => 'Anim pariatur cliche 2...',
                'options' => ['id' => 'myveryownID'],
            ],
            [
                'label' => 'Cronograma',
                'content' => 'Anim pariatur cliche 2...',
                'options' => ['id' => 'myveryownID'],
            ],
            [
                'label' => 'Calendario',
                'content' => 'Anim pariatur cliche 2...',
                'options' => ['id' => 'myveryownID'],
            ],
            
        ],
    ]); ?>
    </div>
</div>
