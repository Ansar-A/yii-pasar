<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Garis $model */

$this->title = 'Create Garis';
$this->params['breadcrumbs'][] = ['label' => 'Garis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="garis-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>