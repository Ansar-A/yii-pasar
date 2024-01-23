<?php

use common\models\Pasar;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pedagang $model */
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
                        <div class="col-sm-6">
                            <?= $form->field($model, 'nama_pedangang')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-6"><?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'tempat_jualan')->dropDownList(['kios' => 'Kios', 'los' => 'Los', 'lapak' => 'Lapak',], ['prompt' => 'Pilih Tempat Jualan...']) ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'jenis_jualan')->textInput(['maxlength' => true]) ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'omset_perbulan')->textInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'photo')->fileInput() ?></div>
                        <div class="col-sm-6"><?= $form->field($model, 'alamat')->textarea(['maxlength' => true]) ?></div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'get_pasar')->dropDownList(
                                ArrayHelper::map(
                                    $data = Pasar::find()->all(),
                                    'id_pasar',
                                    'nama_pasar'
                                ),
                                ['prompt' => 'Pilih Pasar...']
                            ) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>