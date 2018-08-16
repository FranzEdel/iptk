<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RecursosHumanos */

$this->title = 'Create Recursos Humanos';
$this->params['breadcrumbs'][] = ['label' => 'Recursos Humanos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recursos-humanos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
