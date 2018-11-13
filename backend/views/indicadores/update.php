<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Indicadores */

$this->title = 'Actualizar Indicador: ';
$this->params['breadcrumbs'][] = ['label' => 'Indicadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-leaf"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
