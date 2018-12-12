<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Personal */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user"></i> <?= Html::encode($this->title) ?> datos del Usuario</h3>
    </div>
    <div class="box-body">

        <?= $this->render('_form', [
            'model' => $model,
            'user' => $user,
        ]) ?>

    </div>
</div>