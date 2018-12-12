<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Indicadores */

$this->title = 'Información';
$this->params['breadcrumbs'][] = ['label' => 'Indicadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-leaf"></i> <?= Html::encode($this->title) . ' detallada del Indicador:' ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('<i class="fa fa-pencil"></i> Actualizar', ['update', 'id' => $model->id_i], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-remove"></i> Eliminar', ['delete', 'id' => $model->id_i], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('<i class="fa fa-list-alt"></i> Lista principal', ['index'], ['class' => 'btn btn-info']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'proyecto',
                    'label' => 'Proyecto',
                    'value' => function($model){
                        return $model->proyecto0->nombre_p;
                    }
                ],
                [
                    'attribute' => 'resultado',
                    'label' => 'Resultado',
                    'value' => function($model){
                        return $model->resultado0->nombre;
                    }
                ],
                [
                    'attribute' => 'codigo_i',
                    'label' => 'Código',
                    'value' => function($model){
                        return $model->codigo_i;
                    }
                ],
                [
                    'attribute' => 'nombre',
                    'label' => 'Indicador anual de Resultado',
                    'value' => function($model){
                        return $model->nombre;
                    }
                ],
                [
                    'attribute' => 'medio_verificacion',
                    'label' => 'Medio de Verificación',
                    'value' => function($model){
                        return $model->fuente_verificacion;
                    }
                ],
            ],
        ]) ?>
    </div>
</div>
