<?php

use common\models\Garis;
use common\models\User;
use kartik\file\FileInput;
use kartik\money\MaskMoney;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pasar $model */
/** @var yii\widgets\ActiveForm $form */
// var_dump($model->getErrors());
// die();
?>

<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Pasar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= Url::to(['pasar/index']) ?>">Data Pasar</a></li>
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
                    <h5>Data Pasar Dinas PERDASTRI Gowa</h5>
                </div>
                <div class="card-body">

                    <?php $form = ActiveForm::begin(); ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'nama_pasar')->textInput(['maxlength' => true, 'placeholder' => '']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                            $data = User::find()
                                ->where(['level' => 'Operator'])
                                ->all();
                            echo $form->field($model, 'get_pengelola')->dropDownList(
                                ArrayHelper::map(
                                    $data,
                                    'id',
                                    function ($data) {
                                        return $data->username;
                                    }
                                ),
                                [
                                    'prompt' => 'Pilih Pengelola',
                                    'options' => ['disabled' => true],
                                ]
                            )->label('Nama Kepala/Pengelola');
                            ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'no_telp')->textInput(['maxlength' => true, 'type' => 'number']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'thn_pembangunan')->textInput([
                                // 'type' => 'text',
                                // 'pattern' => '\d{4}',
                                // 'placeholder' => 'YYYY',
                                // 'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')",
                                'type' => 'date'
                            ])->label('Tahun Pembangunan') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'thn_renovasi')->textInput([
                                // 'type' => 'text',
                                // 'pattern' => '\d{4}',
                                // 'placeholder' => 'YYYY',
                                // 'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')",
                                'type' => 'date'
                            ])->label('Tahun Renovasi')  ?>
                        </div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'garis_bujur')->dropDownList(
                                ArrayHelper::map(
                                    $data = Garis::find()->all(),
                                    'id_garis',
                                    function ($data) {
                                        return $data->get_pasar . ' | ' . $data->garisBujur;
                                    }
                                ),
                                ['prompt' => 'Pilih...']
                            ) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'garis_lintang')->dropDownList(ArrayHelper::map(
                                $data = Garis::find()->all(),
                                'id_garis',
                                function ($data) {
                                    return $data->get_pasar . ' | ' . $data->garisLintang;
                                }
                            ), ['prompt' => 'Pilih...']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'kondisi_pasar')->dropDownList(['baik' => 'Baik', 'rusak_sedang' => 'Rusak sedang', 'rusak_ringan' => 'Rusak ringan', 'rusak_berat' => 'Rusak berat',], ['prompt' => 'Pilih Kondisi']) ?>
                        </div>

                        <div class="col-sm-4"><?= $form->field($model, 'jml_dasaran_kios')->textInput(['type' => 'number']) ?></div>
                        <div class="col-sm-4"><?= $form->field($model, 'jml_dasaran_los')->textInput(['type' => 'number']) ?></div>
                        <div class="col-sm-4"><?= $form->field($model, 'kondisi_dasaran_kios')->dropDownList(['baik' => 'Baik', 'kurang_baik' => 'Kurang baik',], ['prompt' => 'Pilih Kondisi']) ?></div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'kondisi_dasaran_los')->dropDownList(['baik' => 'Baik', 'kurang_baik' => 'Kurang baik',], ['prompt' => 'Pilih Kondisi']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'kapasitas_bangunan')->textInput() ?>
                        </div>
                        <div class="col-sm-4"><?= $form->field($model, 'luas_lahan')->textInput(['maxlength' => true, 'placeholder' => 'exp: m²']) ?></div>

                        <div class="col-sm-4">
                            <?= $form->field($model, 'kepemilikan_lahan')->dropDownList(['PEMDA' => 'Pemerintah Daerah', 'MASYARAKAT' => 'Masyarakat'], ['prompt' => 'Pilih...']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'unit_kerja_pengelola')->dropDownList(['DINAS_PERDASTRI' => 'Dinas PERDASTRI']) ?></div>
                        <div class="col-sm-4"><?= $form->field($model, 'legalitas_lahan')->dropDownList(['Legal' => 'Legal', 'NonLegal' => 'NonLegal'], ['prompt' => 'Pilih...']) ?></div>

                        <div class="col-sm-4"><?= $form->field($model, 'jumlah_pedagang')->textInput() ?></div>
                        <div class="col-sm-4"> <?= $form->field($model, 'jumlah_pengunjung')->textInput() ?></div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'omset_perbulan')->textInput(['type' => 'number']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'keterangan')->textarea(['maxlength' => true]) ?>
                        </div>
                    </div>
                    <p>
                        <hr>
                    </p>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($model, 'sertifikasi')->fileInput()->label('File Sertifikasi') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'photo_depan')->fileInput()->label('Photo Pasar (Depan)') ?>

                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'photo_belakang')->fileInput()->label('Photo Pasar (Belakang)') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'photo_kanan')->fileInput()->label('Photo Pasar (Kanan)') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'photo_kiri')->fileInput()->label('Photo Pasar (Kiri)') ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($model, 'photo_dalam')->fileInput()->label('Photo Pasar (Dalam)') ?>
                        </div>
                    </div>
                    <p>
                        <hr>
                    </p>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Kembali', ['pasar/index'], [
                            'class' => 'btn btn-outline-secondary has-ripple',
                        ]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>