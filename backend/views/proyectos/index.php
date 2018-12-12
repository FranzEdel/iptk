<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Programas;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'programa')->dropDownList(
                        ArrayHelper::map(Programas::find()->all(), 'id_pr', 'nombre'),
                        [
                            'prompt' => '-- Filtrar por Programa --',
                            'onchange' => '
                                $.post( "index.php?r=proyectos/filtro&id='.'"+$(this).val());
                            '
                        ]
        )->label('Lista de Programas',['class'=>'label-class']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        
        <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'exportConfig' => [
                GridView::EXCEL => 'inactive',
                GridView::PDF => 'inactive',
            ],
            //'showPageSummary'=>true,
            'pjax'=>true,
            'pjaxSettings' => [
                'options' => [
                    'enablePushState' => false,
                ],
            ],
            'striped'=>true,
            'hover'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i>  <b>Lista principal de todos los Proyectos</b></h3>',
                'type'=>'success',
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Proyecto', ['create'], ['class' => 'btn btn-success']),
                'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                //'footer'=>false
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute' => 'herramienta',
                    'label' => 'Herramienta',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '300px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'font-weight' => 'bold',
                        ],
                    ],
                    'value' => function($model){
                        return $model->herramienta0->nombre;
                    },
                    'hAlign'=>'center',
                    'group'=>true,  // enable grouping
                    'subGroupOf'=>1 // supplier column index is the parent group
                ],
                [
                    'attribute' => 'codigo_p',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '300px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                [
                    'attribute' => 'nombre_p',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '300px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                [
                    'attribute' => 'agencias',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                [
                    'attribute' => 'municipios',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                [
                    'attribute' => 'periodo',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                [
                    'attribute' => 'responsable',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                [
                    'attribute' => 'num_trabajadores',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                /*[
                    'label' => 'Acciones',
                    'format' => 'raw',
                    'value' => function($data){
                        $id = $data['id_p'];
                        $btn_view = Html::a('<i class="fa fa-eye"></i>', ['proyectos/view', 'id' => $id], ['class' => 'btn btn-warning', 'title' => 'Ver']);
                        $btn_edit = Html::a('<i class="fa fa-pencil"></i>', ['proyectos/update', 'id' => $id], ['class' => 'btn btn-success', 'title' => 'Actualizar']);
                        $btn_delete = Html::a('<i class="fa fa-trash"></i>', ['proyectos/delete', 'id' => $id], [
                            'class' => 'btn btn-danger',
                            'title' => 'Eliminar',
                            'data' => [
                                'confirm' => '¿Esta seguro que desea eliminar el Item?',
                                'method' => 'post',
                            ],
                        ]);
                        return Html::a($btn_view . ' ' .$btn_edit . ' ' . $btn_delete, '#');
                    },
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                    'hAlign'=>'center',
                ],*/
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'contentOptions' => [
                        'style' => [
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>
