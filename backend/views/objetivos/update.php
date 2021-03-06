<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */

$this->title = 'Actualizar Objetivo: ';
$this->params['breadcrumbs'][] = ['label' => 'Objetivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_o, 'url' => ['view', 'id' => $model->id_o]];
$this->params['breadcrumbs'][] = 'Update';
?>
 <div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
