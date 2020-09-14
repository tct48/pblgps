<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'สมัครสมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>โปรดกรอกข้อมูลให้ครบถ้วน</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('ยูซเซอร์เนม') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('รหัสผ่าน') ?>
                <?= $form->field($model, 'email')->label('อีเมลล์') ?>
                <?= $form->field($model, 'firstname')->textInput(['autofocus' => true])->label('ชื่อจริง') ?>
                <?= $form->field($model, 'lastname')->textInput(['autofocus' => true])->label('นามสกุล') ?>
                <?= $form->field($model, 'phone')->textInput(['autofocus' => true])->label('เบอร์โทร') ?>

                <div class="form-group">
                    <?= Html::submitButton('สมัครสมาชิก', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
