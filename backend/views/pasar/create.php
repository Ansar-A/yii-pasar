<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pasar $model */

$this->title = 'Create Pasar';
$this->params['breadcrumbs'][] = ['label' => 'Pasars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasar-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>