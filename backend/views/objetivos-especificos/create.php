<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ObjetivosEspecificos */

$this->title = 'Create Objetivos Especificos';
$this->params['breadcrumbs'][] = ['label' => 'Objetivos Especificos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivos-especificos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
