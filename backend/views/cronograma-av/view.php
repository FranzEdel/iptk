<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAv */

$this->title = 'Avance en Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Avance', 'url' => ['index']];

?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id_ca], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_ca], [
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
                [
                    'attribute' => 'proyecto',
                    'label' => 'Proyecto:',
                    'value' => function($model){
                        return $model->proyecto0->nombre_p;
                    },
                ],
                [
                    'attribute' => 'resultado',
                    'label' => 'Resultado:',
                    'value' => function($model){
                        return $model->resultado0->nombre;
                    },
                ],
                [
                    'attribute' => 'actividad',
                    'label' => 'Actividad:',
                    'value' => function($model){
                        return $model->actividad0->nombre;
                    },
                ],
                [
                    'attribute' => 'ene',
                    'label' => 'Enero',
                    'value' => function($model){
                        if($model->ene == 0){
                            return 'No Programado';
                        } else {
                            return $model->ene . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'feb',
                    'label' => 'Febrero',
                    'value' => function($model){
                        if($model->feb == 0){
                            return 'No Programado';
                        } else {
                            return $model->feb . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'mar',
                    'label' => 'Marzo',
                    'value' => function($model){
                        if($model->mar == 0){
                            return 'No Programado';
                        } else {
                            return $model->mar . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'abr',
                    'label' => 'Abril',
                    'value' => function($model){
                        if($model->abr == 0){
                            return 'No Programado';
                        } else {
                            return $model->abr . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'may',
                    'label' => 'Mayo',
                    'value' => function($model){
                        if($model->may == 0){
                            return 'No Programado';
                        } else {
                            return $model->may . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'jun',
                    'label' => 'Junio',
                    'value' => function($model){
                        if($model->jun == 0){
                            return 'No Programado';
                        } else {
                            return $model->jun . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'jul',
                    'label' => 'Julio',
                    'value' => function($model){
                        if($model->jun == 0){
                            return 'No Programado';
                        } else {
                            return $model->jun . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'ago',
                    'label' => 'Agosto',
                    'value' => function($model){
                        if($model->ago == 0){
                            return 'No Programado';
                        } else {
                            return $model->ago . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'sep',
                    'label' => 'Septiembre',
                    'value' => function($model){
                        if($model->sep == 0){
                            return 'No Programado';
                        } else {
                            return $model->sep . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'oct',
                    'label' => 'Octubre',
                    'value' => function($model){
                        if($model->oct == 0){
                            return 'No Programado';
                        } else {
                            return $model->oct . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'nov',
                    'label' => 'Noviembre',
                    'value' => function($model){
                        if($model->nov == 0){
                            return 'No Programado';
                        } else {
                            return $model->nov . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'dic',
                    'label' => 'Diciembre',
                    'value' => function($model){
                        if($model->dic == 0){
                            return 'No Programado';
                        } else {
                            return $model->dic . ' %';
                        }
                    }
                ],
                [
                    'attribute' => 'avance',
                    'label' => 'Avance total de la actividad:',
                    'value' => function($model){
                        return $model->avance . ' %';
                    },
                ],
                //'total',
                //'recursos_h',
                
            ],
        ]) ?>
    </div>
</div>
