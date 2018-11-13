<?php

use yii\helpers\Html;

?>
 <div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tags"></i>Actualizar</h3>
    </div>
    <div class="box-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_formodal', [
            'model' => $model,
            'id_p' => $id_p,
        ]) ?>
    </div>
</div>
