<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Objetivos;
use backend\models\Proyectos;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\CronogramaEjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Objetivos';
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
                                $.post( "index.php?r=objetivos/filtro&id='.'"+$(this).val());
                            '
                        ]
        )->label('Lista de Proyectos',['class'=>'label-class']) ?>
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
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i>  <b>Lista principal de todos los Objetivos</b></h3>',
                    'type'=>'success',
                    'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Objetivo', ['create'], ['class' => 'btn btn-success']),
                    'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                    'footer'=>false
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                'columns'=>[
                    ['class'=>'kartik\grid\SerialColumn'],
                    /*[
                        'attribute'=>'proyecto',
                        'width' => '400px', 
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                            ],
                        ],
                        'value'=>function ($model, $key, $index, $widget) { 
                            return $model->proyecto0->nombre_p;
                        },
                        'filterType'=>GridView::FILTER_SELECT2,
                        'filter'=>ArrayHelper::map(Proyectos::find()->orderBy('nombre_p')->asArray()->all(), 'id_p', 'nombre_p'), 
                        'filterWidgetOptions'=>[
                            'pluginOptions'=>['allowClear'=>true],
                        ],
                        'filterInputOptions'=>['placeholder'=>'Buscar por Proyecto'],
                        'group'=>true,  // enable grouping
                        'subGroupOf'=>1 // supplier column index is the parent group
                    ],*/
                    [
                        'attribute'=>'nombre',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                            ],
                        ],
                    ],
                    [
                        'attribute'=>'indicador',
                        'contentOptions' => [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Acciones',
                        'format' => 'raw',
                        'value' => function($data){
                            $id = $data['id_o'];
                            $btn_view = Html::a('<i class="fa fa-eye"></i>', ['objetivos/view', 'id' => $id], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                            $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['objetivos/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                            $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['objetivos/delete', 'id' => $id], [
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

