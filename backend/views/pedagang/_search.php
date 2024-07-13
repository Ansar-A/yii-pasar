<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PedagangSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pedagang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pedagang') ?>

    <?= $form->field($model, 'nama_pedangang') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'tempat_jualan') ?>

    <?php // echo $form->field($model, 'jenis_jualan') ?>

    <?php // echo $form->field($model, 'omset_perbulan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    

    <?php // echo $form->field($model, 'get_pasar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
