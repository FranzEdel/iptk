<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Carousel;

$this->title = 'IPTK';
?>
<div class="site-index">

    <div class="jumbotron">
         <?= Carousel::widget([
              'items' => [
                  ['content'=>  Html::img('@web/img/1.jpg')],
                  ['content' =>Html::img('@web/img/2.jpg'),
                    ],        
                  ],
                ]);
          ?>
        <h1>IPTK</h1>

        <p class="lead">Instituto Politécnico "Tomás Katari.</p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Médios</h2>
                <p><?= Html::img('@web/img/3.jpg') ?></p>
                <p><a class="btn btn-default" href="#">Radio América &raquo;</a></p>
                <p><?= Html::img('@web/img/4.jpg') ?></p>
                <p><a class="btn btn-default" href="#">Galeria &raquo;</a></p>
                <p><?= Html::img('@web/img/4.jpg') ?></p>
                <p><a class="btn btn-default" href="#">Centro de Investigación &raquo;</a></p>

            </div>
            <div class="col-lg-4">
                <h2>Noticias IPTK</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><?= Html::img('@web/img/4.jpg') ?></p>

                <p><a class="btn btn-default" href="#">Leer Más &raquo;</a></p>

                <h2>Noticias Nacionales y Coyuntura Actual</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><?= Html::img('@web/img/4.jpg') ?></p>

                <p><a class="btn btn-default" href="#">Leer Más &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Proyectos Solidarios</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><?= Html::img('@web/img/4.jpg') ?></p>

                <p><a class="btn btn-default" href="#">Leer Más &raquo;</a></p>
                
                <h2>Eventos</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><?= Html::img('@web/img/4.jpg') ?></p>

                <p><a class="btn btn-default" href="#">Leer Más &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
