<?php

use yii\debug;
use yii\widgets\ActiveForm;
use yii\helpers\varDumper;
use yii\helpers\Html;
use yii\captcha\Captcha;

$this->title = 'Enter form';
?>
<h1 class="feedback-title">Форма обратной связи</h1>
<div class="site-index">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($userForm, 'name') ?>

            <?= $form->field($userForm, 'surname') ?>

            <?= $form->field($userForm, 'email') ?>

            <?= $form->field($userForm, 'phone')->widget(\yii\widgets\MaskedInput::className(),
                ['name' => 'phone', 'mask' => '+7(999)999-99-99']) ?>

            <?= $form->field($userForm, 'text')->textarea(['rows' => 6]) ?>

            <?= $form->field($userForm, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha2::className(),
                [
                    'siteKey' => '6Ld3XTYaAAAAAPSZgxI0Qpgb0GMlMkXRgDtzt_ZC', // unnecessary is reCaptcha component was set up
                ]
            )->label(''); ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


