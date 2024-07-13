<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PasarSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pasar') ?>

    <?= $form->field($model, 'nama_pasar') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'get_pengelola') ?>

    <?= $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'thn_pembangunan') ?>

    <?php // echo $form->field($model, 'thn_renovasi') ?>

    <?php // echo $form->field($model, 'garis_bujur') ?>

    <?php // echo $form->field($model, 'garis_lintang') ?>

    <?php // echo $form->field($model, 'kondisi_pasar') ?>

    <?php // echo $form->field($model, 'jml_dasaran_kios') ?>

    <?php // echo $form->field($model, 'jml_dasaran_los') ?>

    <?php // echo $form->field($model, 'kondisi_dasaran_kios') ?>

    <?php // echo $form->field($model, 'kondisi_dasaran_los') ?>

    <?php // echo $form->field($model, 'kapasitas_bangunan') ?>

    <?php // echo $form->field($model, 'luas_lahan') ?>

    <?php // echo $form->field($model, 'kepemilikan_lahan') ?>

    <?php // echo $form->field($model, 'unit_kerja_pengelola') ?>

    <?php // echo $form->field($model, 'legalitas_lahan') ?>

    <?php // echo $form->field($model, 'jumlah_pedagang') ?>

    <?php // echo $form->field($model, 'jumlah_pengunjung') ?>

    <?php // echo $form->field($model, 'omset_perbulan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'photo_depan') ?>

    <?php // echo $form->field($model, 'photo_belakang') ?>

    <?php // echo $form->field($model, 'photo_kiri') ?>

    <?php // echo $form->field($model, 'photo_kanan') ?>

    <?php // echo $form->field($model, 'photo_dalam') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
