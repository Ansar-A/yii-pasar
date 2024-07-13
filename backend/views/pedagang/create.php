<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pedagang $model */

$this->title = 'Create Pedagang';
$this->params['breadcrumbs'][] = ['label' => 'Pedagangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedagang-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>