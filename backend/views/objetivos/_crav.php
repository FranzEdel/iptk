<?php

use yii\helpers\Html;
use yii\grid\GridView;


?>
<div class="cronograma-av-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_ca',
            'item',
            'ene',
            'feb',
            'mar',
            'abr',
            'may',
            'jun',
            'jul',
            'ago',
            'sep',
            'oct',
            'nov',
            'dic',
            'recursos_h',
            //'actividad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
