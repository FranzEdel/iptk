<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CronogramaAv */

$this->title = 'Create Cronograma Av';
$this->params['breadcrumbs'][] = ['label' => 'Cronograma Avs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cronograma-av-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
