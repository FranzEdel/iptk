<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Resultados */

$this->title = 'Información principal del Resultado';
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_r], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_r], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro de eliminar el dato?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Resultados', ['index'], ['class' => 'btn btn-info']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'proyecto0.nombre_p',
                [
                    'attribute' => 'objetivo',
                    'label' => 'Objetivo',
                    'value' => function($model){
                        return $model->objetivoE->nombre;
                    },
                ],
                'nombre',
                
            ],
        ]) ?>
    </div>       
</div>
