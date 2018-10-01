<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Eventos */

$this->title = 'Evento: '.$model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro que desea eliminar el Evento?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Listado', ['lista'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Calendario', ['index'], ['class' => 'btn btn-warning']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'titulo',
                'descripcion',
                'fecha_creacion',
                'proyecto0.nombre_p',
            ],
        ]) ?>
    </div>
</div>
