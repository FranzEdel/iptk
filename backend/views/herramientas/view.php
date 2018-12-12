<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Herramientas */

$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Herramientas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_h], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_h], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro que desea eliminar la Herramienta?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Lista principal', ['index'], ['class' => 'btn btn-info']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'programa',
                    'value' => function($model){
                        return $model->programa0->nombre;
                    },

                ],
                'nombre',
            ],
        ]) ?>
    </div>
</div>
