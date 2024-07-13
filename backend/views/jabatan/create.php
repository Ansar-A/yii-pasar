<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Jabatan $model */

$this->title = 'Create Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Jabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>