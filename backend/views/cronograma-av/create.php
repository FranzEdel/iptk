<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAv */

$this->title = 'Avance de la actividad';
$this->params['breadcrumbs'][] = ['label' => 'CronogramaAv', 'url' => ['index']];
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
