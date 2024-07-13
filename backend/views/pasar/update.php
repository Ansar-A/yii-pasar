<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pasar $model */

$this->title = 'Update Pasar: ' . $model->id_pasar;
$this->params['breadcrumbs'][] = ['label' => 'Pasars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pasar, 'url' => ['view', 'id_pasar' => $model->id_pasar]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="pasar-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>