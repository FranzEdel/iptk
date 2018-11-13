<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */

$this->title = 'Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Objetivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Lista Objetivos', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['updatemodal', 'id' => $model->id_o, 'id_p' => $id_p], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['deletemodal', 'id' => $model->id_o, 'id_p' => $id_p], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro que desea eliminar el Objetivo?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'proyecto',
                    'label' => 'Proyecto:',
                    'value' => function($model){
                        return $model->proyecto0->nombre_p;
                    }
                ],
                [
                    'attribute' => 'objetivo',
                    'label' => 'Nombre del Objetivo:',
                    'value' => function($model){
                        return $model->nombre;
                    }
                ],
                [
                    'attribute' => 'indicador',
                    'label' => 'Nombre del Indicador:',
                    'value' => function($model){
                        return $model->indicador;
                    }
                ],
            ],
        ]) ?>

    </div>
</div>
