<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-tasks"></i> <?= Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">
        <p>
            <?= Html::button('Nuevo Proyecto', ['value' => Url::to('index.php?r=proyectos/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
        </p>
        <?php 
            Modal::begin([
                //'header' => '<h4>Nuevo Proyecto</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
                echo "<div id='modalContent'></div>";
            Modal::end();
         ?>
        
        <?php Pjax::begin(['id' => 'proyectosGrid']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id_p',
                [
                    'attribute' => 'nombre_p',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '400px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                [
                    'attribute' => 'objetivo_general',
                    'contentOptions' => [
                        'style' => [
                            'max-width' => '700px',
                            'white-space' => 'normal',
                        ],
                    ],
                ],
                
                'fecha_ini',
                'fecha_fin',
                'estado',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'class' => 'pjax-update-link',
                                'delete-url' => $url,
                                'pjax-container' => 'proyectosGrid',
                                'title' => Yii::t('yii', 'Update'),
                            ]);
                        },
                        'delete' => function ($url) {
                            return Html::a(Yii::t('yii', '<span class="glyphicon glyphicon-trash"></span>'), '#', [
                                'title' => Yii::t('yii', 'Delete'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'onclick' => "
                                    if (confirm('¿Esta seguro de eliminar el Proyecto?')) {
                                        $.ajax('$url', {
                                            type: 'POST'
                                        }).done(function(data) {
                                            $.pjax.reload({container: '#proyectosGrid'});
                                        });
                                    }
                                    return false;
                                ",
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<?php
$script = <<< JS
    $(document).on('ready pjax:success', function() {
         $('.ajaxDelete').on('click', function(e) {
             e.preventDefault();
             var deleteUrl = $(this).attr('delete-url');
             var pjaxContainer = $(this).attr('pjax-container');
             bootbox.confirm('Are you sure you want to change status of this item?',
                    function (result) {
                        if (result) {
                            $.ajax({
                                url:   deleteUrl,
                                type:  'post',
                                error: function (xhr, status, error) {
                                    alert('There was an error with your request.' 
                                        + xhr.responseText);
                                }
                            }).done(function (data) {
                                $.pjax.reload({container: '#' + $.trim(pjaxContainer)});
                            });
                        }
                    }
            );
         });
     });
JS;
$this->registerJS($script);
?>