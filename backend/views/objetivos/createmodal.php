<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */

$this->title = 'Nuevo Objetivo';
$this->params['breadcrumbs'][] = ['label' => 'Objetivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_formodal', [
            'model' => $model,
        ]) ?>
    </div>      
</div>
