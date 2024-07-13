<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\GarisSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="garis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_garis') ?>

    <?= $form->field($model, 'get_pasar') ?>

    <?= $form->field($model, 'garisBujur') ?>

    <?= $form->field($model, 'garisLintang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
