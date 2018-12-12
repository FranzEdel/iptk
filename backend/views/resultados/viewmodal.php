<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Resultados */

$this->title = 'Información principal del Resultado';
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Lista Resultados', ['proyectos/view', 'id' => $id_p], ['class' => 'btn btn-info']) ?>
            <?= Html::a('Actualizar', ['updatemodal', 'id' => $model->id_r, 'id_p' => $id_p], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['deletemodal', 'id' => $model->id_r, 'id_p' => $id_p], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Esta seguro que desea eliminar el Resultado?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'proyecto0.nombre_p',
                'codigo_r',
                'nombre',
                
            ],
        ]) ?>
    </div>       
</div>