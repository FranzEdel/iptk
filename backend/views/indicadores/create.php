<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Indicadores */

$this->title = 'Create Indicadores';
$this->params['breadcrumbs'][] = ['label' => 'Indicadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicadores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
