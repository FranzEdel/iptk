<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Personal */

$this->title = $model->nombre. ' ' .$model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user"></i> Usuario: <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_user], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_user], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Principal', ['index'], ['class' => 'btn btn-info']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nombre',
                'apellido',
                [
                    'label' => 'Nombre de Usuario',
                    'value' => function($model){
                        return $model->user0->username;
                    }
                ],
                'user0.email',
                'estado',
                'rol',
            ],
        ]) ?>
    </div>
</div>
