<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\personal\models\PersonalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-users"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Nueva Persona', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Usuario',
                    'value' => function($model){
                        return $model->fullName;
                    }
                ],
                [
                    'label' => 'Nombre de Usuario',
                    'value' => function($model){
                        return $model->user0->username;
                    } 
                ],
                'estado',
                [
                    'label' => 'Rol',
                    'value' => function($model){
                        return $model->user0->rol;
                    } 
                ],
                [
                    'label' => 'Email',
                    'value' => function($model){
                        return $model->user0->email;
                    } 
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
