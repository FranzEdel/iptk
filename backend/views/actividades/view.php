<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::a('Lista Actividades', ['index'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_a], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_a], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Seguro que desea eliminar esta actividad?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id_a',
                'nombre',
                'indicador',
                'indicador0.nombre',
            ],
        ]) ?>
    </div>        
</div>
