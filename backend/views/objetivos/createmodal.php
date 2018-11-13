<?php

use yii\helpers\Html;

$this->title = 'Nuevo Objetivo';
?>
<div class="box box-danger box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
    
        <?= $this->render('_formodal', [
            'model' => $model,
            'id_p' => $id_p,
        ]) ?>
    </div>      
</div>
