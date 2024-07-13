<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pedagang $model */

$this->title = 'Update Pedagang: ' . $model->id_pedagang;
$this->params['breadcrumbs'][] = ['label' => 'Pedagangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pedagang, 'url' => ['view', 'id_pedagang' => $model->id_pedagang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedagang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
