<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Objetivos */

$this->title = 'Update Objetivos: ' . $model->id_o;
$this->params['breadcrumbs'][] = ['label' => 'Objetivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_o, 'url' => ['view', 'id' => $model->id_o]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="objetivos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
