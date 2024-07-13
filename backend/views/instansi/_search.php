<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\InstansiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="instansi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_instansi') ?>

    <?= $form->field($model, 'nama_instansi') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'kepala_instansi') ?>

    <?php // echo $form->field($model, 'visi_misi') ?>

    <?php // echo $form->field($model, 'status_hukum') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
