<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use backend\models\Programas;

use yii\widgets\Pjax;
use yii\helpers\Url;

use backend\models\CronogramaAv;
use backend\models\CronogramaEj;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Informe';
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
                                $.post( "index.php?r=proyectos/filtro2&id='.'"+$(this).val());
                            '
                        ]
        )->label('Lista de Programas',['class'=>'label-class']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="box box-success box-solid">
    <div class="box-body">
        
        <?= GridView::widget([
            'dataProvider'=>$dataProvider,
            //'filterModel'=>$searchModel,
            'exportConfig' => [
                GridView::EXCEL => 'inactive',
                GridView::PDF => 'inactive',
            ],
            'showPageSummary'=>true,
            'pjax'=>true,
            'striped'=>true,
            'hover'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-file"></i>  <b>Informe general de todos los Proyectos</b></h3>',
                'type'=>'success',
                //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Proyecto', ['create'], ['class' => 'btn btn-success']),
                'after'=>Html::a('<i class="fas fa-redo"></i> Actualizar lista', ['index'], ['class' => 'btn btn-info']),
                //'footer'=>true
            ],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns'=>[
                ['class'=>'kartik\grid\SerialColumn'],
                [
                    'attribute' => 'herramienta',
                    'label' => 'Herramienta',
                    'width' => '150px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
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
                    'attribute' => 'nombre_p',
                    'width' => '300px',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '350px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                        ],
                    ],
                ],
                
                [
                    'attribute' => 'presupuesto',
                    'width' => '150px',
                    'value' => function($model){
                        return number_format($model->presupuesto, 2) . ' Bs';
                    },
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '200px',
                            'white-space' => 'normal',
                            'vertical-align' => 'middle',
                            'font-weight' => 'bold',
                        ],
                    ],
                    'hAlign'=>'center',
                ],
                [
                    'label' => 'Monto Ejecutado',
                    'width' => '150px',
                    'value' => function($model){
                        return CronogramaEj::instance()->getTotalPro($model->id_p);
                    },
                    'contentOptions' => function($model){
                        $pre = $model->presupuesto;
                        $pre_ej = CronogramaEj::instance()->getTotalPro($model->id_p);
                        if($pre < $pre_ej){
                            $color = 'black';
                        }else{
                            $color = 'red';
                        }
                        return [
                            'style' => [
                                'max-width' => '200px',
                                'white-space' => 'normal',
                                'vertical-align' => 'middle',
                                'font-weight' => 'bold',
                                'color' => $color,
                            ],
                        ];
                    },
                    'hAlign'=>'center',
                ],
                [
                    'label' => 'Avance general',
                    //'width' => '100px',
                    'value' => function($model){
                        $info = CronogramaAv::getTotalAvanceGeneral($model->id_p);
                        return "{$info}%";
                    },
                    'contentOptions' => function($model){
                        $info = CronogramaAv::getTotalAvanceGeneral($model->id_p);
                        if ( $info >= 0 and $info <= 30){
                            $clase = 'progress-bar progress-bar-danger progress-bar-striped';
                        }elseif ($info >= 31 and $info <= 75){
                            $clase = 'progress-bar progress-bar-warning progress-bar-striped';
                        }else{
                            $clase = 'progress-bar progress-bar-success progress-bar-striped';
                        }
                        return [
                            'class' => $clase,
                            'style' => [
                                'width' => "{$info}%",
                                'font-weight' => 'bold',
                                'vertical-align' => 'middle',
                                'color' => 'black',
                                'max-width' => '300px',
                            ],
                        ];
                    },
                    'hAlign'=>'center',
                ],
            ],
        ]); ?>
    </div>
</div>