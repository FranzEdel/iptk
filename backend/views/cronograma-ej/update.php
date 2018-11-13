<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaEj */

$this->title = 'Actualizar: ';
$this->params['breadcrumbs'][] = ['label' => 'Cronograma', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
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
