<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RecursosHumanos */

$this->title = 'Update Recursos Humanos: ' . $model->id_rh;
$this->params['breadcrumbs'][] = ['label' => 'Recursos Humanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rh, 'url' => ['view', 'id' => $model->id_rh]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recursos-humanos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
