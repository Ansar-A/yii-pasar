<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Instansi $model */

$this->title = 'Update Instansi: ' . $model->id_instansi;
$this->params['breadcrumbs'][] = ['label' => 'Instansis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_instansi, 'url' => ['view', 'id_instansi' => $model->id_instansi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instansi-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>