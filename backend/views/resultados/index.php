<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use backend\models\Objetivos;
use backend\models\Resultados;
use backend\models\Indicadores;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'proyecto')->dropDownList(
                        ArrayHelper::map(Proyectos::find()->all(), 'id_p', 'nombre_p'),
                        [
                            'prompt' => '-- Filtrar por Proyecto --',
                            'onchange' => '
                                $.post( "index.php?r=resultados/filtro&id='.'"+$(this).val());
                            '
                        ]
        )->label('<i class="fa fa-book"></i> Lista de Proyectos',['class'=>'label-class']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="box box-success box-solid">

    <div class="box-body">

        <?= GridView::widget([
                'dataProvider'=>$dataProvider,
                'filterModel'=>$searchModel,
                'exportConfig' => [
                    GridView::EXCEL => 'inactive',
                    GridView::PDF => 'inactive',
                ],
                'showPageSummary'=>true,
                'pjax'=>true,
                'striped'=>true,
                'hover'=>true,
                'panel'=>[
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i>  <b>Lista principal de todos los Resultados</b></h3>',
                    'type'=>'success',
                    'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Resultado', ['create'], ['class' => 'btn btn-success']),
                    'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                    'footer'=>false
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],
                    [
                        'attribute'=>'objetivo_e',
                        'width' => '400px', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->objetivoE->nombre;
                        },
                        'group'=>true,  // enable grouping
                        'subGroupOf'=>1 // supplier column index is the parent group
                    ],
                    [
                        'attribute'=>'nombre',
                        'contentOptions' => [
                            'style' => [
                                'font-weight' => 'bold',
                                'max-width' => '200px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Acciones',
                        'format' => 'raw',
                        'value' => function($data){
                            $id = $data['id_r'];
                            $btn_view = Html::a('<i class="fa fa-eye"></i>', ['resultados/view', 'id' => $id], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                            $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['resultados/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                            $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['resultados/delete', 'id' => $id], [
                                'class' => 'btn btn-danger',
                                'title' => 'Eliminar',
                                'data' => [
                                    'confirm' => '¿Esta seguro que desea eliminar el Item?',
                                    'method' => 'post',
                                ],
                            ]);
                            return Html::a($btn_view . ' ' .$btn_edit . ' ' . $btn_delete, '#');
                        }
                    ],
                ],
            ]); ?>
    </div>
</div>

