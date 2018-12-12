<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */

$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Objetivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Lista Objetivos', ['index'], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_o], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_o], [
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
                'proyecto0.nombre_p',
                'codigo_o',
                'nombre:ntext',
            ],
        ]) ?>

    </div>
</div>
