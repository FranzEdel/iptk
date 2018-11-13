<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */

$this->title = 'Nueva Actividad';
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-plus"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <?= $this->render('_formodal', [
            'model' => $model,
            'id_p' => $id_p,
        ]) ?>
    </div>
</div>
