<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProgramasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programas';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'exportConfig' => [
                GridView::EXCEL => 'inactive',
                GridView::PDF => 'inactive',
            ],
            //'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i>  <b>Lista principal de todos los Programas</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Programa', ['create'], ['class' => 'btn btn-success']),
                'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],

                'codigo_pr',
                'nombre',
                'descripcion',
                //'objetivo:ntext',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
