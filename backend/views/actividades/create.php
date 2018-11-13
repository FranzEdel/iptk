<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */

$this->title = 'Nueva Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-warning box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
