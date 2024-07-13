<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pcoded-content">

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Form Elements</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                        <li class="breadcrumb-item"><a href="#!">Form Elements</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic Component</h5>
                </div>
                <div class="card-body">

                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-sm-6"><?= $form->field($model, 'username')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'nik')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'email')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'level')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'alamat')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'status')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'photo')->fileInput() ?></div>

                    </div>
                    <!-- <?= $form->field($model, 'status')->textInput() ?> -->
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>