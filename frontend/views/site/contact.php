<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <h4>NOMBRE DE LA INSTITUCIÓN</h4>
    <p>INSTITUTO POLITÉCNICO TOMAS KATARI (IPTK)</p>

    <h4>ESTADO LEGAL</h4>
    <p>Organización No Gubernamental — ONG Resolución Ministerial Nº 181/2014 de 31 de diciembre de 2014 Registro de Personalidad Jurídica: Código de Control: R1375</p>

    <h4>FECHA DE FUNDACIÓN</h4>
    <p>2 de Septiembre de 1976</p>

    <h4>REGISTRO NACIONAL DE ONGS</h4>
    <p>No. 0067</p>

    <h4>REPRESENTANTE LEGAL</h4>
    <p>Dr. Franz Barrios Villegas </n> DIRECTOR GENERAL</p>

    <h4>DIRECCIÓN</h4>
    <p><b>Calle: </b>Nataniel Aguirre Nº 560 (Zona Mercado Campesino)</p>
    <p><b>Teléfono: </b>(591) 4 64 62447 int. 102</p>
    <p><b>Fax: </b>(591) 4 64 62768</p>
    <p><b>Correo Electrónico: </b>iptk@entelnet.bo, direcciongeneral@iptk.org.bo</p>
    <p><b>Casilla Postal: </b>Nº 158</p>  
     
    <h4>Sucre - Bolivia</h4>

</div>
