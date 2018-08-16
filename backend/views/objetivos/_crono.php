<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>

<style type="text/css">
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
    .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
    
    .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
</style>
<div class="container">
	<div class="row">
        <div class="col-lg-12">
        <!-- Nav tabs -->
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Logico</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Tecnico</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="cronograma-av-index">
                            <?= GridView::widget([
                                'dataProvider' => $dataProviderAv,
                                'filterModel' => $searchModelAv,
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
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="cronograma-ej-index">

                            <?= GridView::widget([
                                'dataProvider' => $dataProviderEj,
                                'filterModel' => $searchModelEj,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    //'id_ce',
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
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
