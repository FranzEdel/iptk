<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Indicadores */

$this->title = 'Update Indicadores: ' . $model->id_i;
$this->params['breadcrumbs'][] = ['label' => 'Indicadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_i, 'url' => ['view', 'id' => $model->id_i]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indicadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
