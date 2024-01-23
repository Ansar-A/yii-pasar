<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Instansi $model */

$this->title = 'Create Instansi';
$this->params['breadcrumbs'][] = ['label' => 'Instansis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instansi-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>