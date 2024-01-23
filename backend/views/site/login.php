<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
?>
<div class="auth-content">
    <div class="card" style="margin-left: 300px; margin-right: 300px;margin-top: 20px;">
        <div class="row align-items-center text-center">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="mt-5 offset-lg-1 col-lg-10">
                        <img src="<?= Url::to('@web/ablepro/dist/assets/images/logo2.png') ?>" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400 text-black">Sign In</h4>
                        <p class="mb-2 text-muted">Welcome</p>

                        <p>
                            <hr>
                        </p>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true,]) ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div class="form-group text-left">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('LOGIN', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                        </div>
                        <p>
                            <font>Tidak punya akun?</font> <a href="<?= Url::to(['site/signup']) ?>" class="text-primary m-l-5"><b>
                                    <font>SIGN UP</font>
                                </b></a>
                        </p>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>