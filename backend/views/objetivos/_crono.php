<?php
use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Tabs;
?>

<?php $this->title = 'Cronograma' ?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="col-ls-12">
    <?= Tabs::widget([
    'items' => [
        [
            'label' => 'Avance Lógico',
            'content' => 'Logico',
            'active' => true
        ],
        [
            'label' => 'Avance Técnico',
            'content' => 'Tecnico',
            'options' => ['id' => 'myveryownID'],
        ],
        
        ],
    ]); ?>
    </div>
<div>

