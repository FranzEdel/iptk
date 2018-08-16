<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Resultados */

$this->title = 'Update Resultados: ' . $model->id_r;
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_r, 'url' => ['view', 'id' => $model->id_r]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resultados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
