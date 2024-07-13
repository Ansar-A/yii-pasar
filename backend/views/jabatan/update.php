<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Jabatan $model */

$this->title = 'Update Jabatan: ' . $model->id_jabatan;
$this->params['breadcrumbs'][] = ['label' => 'Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jabatan, 'url' => ['view', 'id_jabatan' => $model->id_jabatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jabatan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>