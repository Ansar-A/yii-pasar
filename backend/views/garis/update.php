<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Garis $model */

$this->title = 'Update Garis: ' . $model->id_garis;
$this->params['breadcrumbs'][] = ['label' => 'Garis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_garis, 'url' => ['view', 'id_garis' => $model->id_garis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="garis-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>