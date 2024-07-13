<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use common\models\Jabatan;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<html>

<head>
    <style>
        .custom-font-size {
            font-size: 14px;
            /* Sesuaikan dengan ukuran yang Anda inginkan */
        }
    </style>
</head>

</html>
<div class="auth-content">
    <div class="card" style="margin-left: 300px; margin-right: 300px;margin-top: 20px;">
        <div class="row align-items-center text-center">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="mt-5 offset-lg-1 col-lg-10">
                        <img src="<?= Url::to('@web/ablepro/dist/assets/images/logo2.png') ?>" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400 text-black">Sign Up</h4>
                        <p>
                            <hr>
                        </p>
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Silahkan masukkan Username anda...']) ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Silahkan masukkan Email anda...']) ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Silahkan masukkan Password anda...']) ?>
                        </div>

                        <div class="form-group text-left">
                            <?= $form->field($model, 'alamat')->textarea(['placeholder' => 'Silahkan masukkan Alamat anda...']) ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'nik')->textInput(['type' => 'number', 'placeholder' => 'Silahkan masukkan NIK anda...']) ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'photo')->fileInput() ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'level')->dropDownList(
                                ['Operator' => 'Operator', 'Admin' => 'Admin', 'SuperAdmin' => 'SuperAdmin'],
                                [
                                    'prompt' => 'Pilih Level User...',
                                    'class' => 'form-control custom-font-size', // Sesuaikan dengan ukuran yang Anda inginkan
                                ]
                            )->label(''); ?>

                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('SIGNUP', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                        </div>
                        <p>
                            <hr>
                        </p>
                        <p class="text-center">
                            <span>Tidak punya akun?</span> <a href="<?= Url::to(['site/login']) ?>" class="text-primary m-l-5"><b>
                                    SIGN IN
                                </b></a>
                        </p>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>