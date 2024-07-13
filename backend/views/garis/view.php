<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Garis $model */

$this->title = $model->id_garis;
$this->params['breadcrumbs'][] = ['label' => 'Garis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Pasar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= Url::to(['pasar/index']) ?>">Data Pasar</a></li>
                        <li class="breadcrumb-item text-white">View Data Pasar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic Table</h5>
                    <span class="d-block m-t-5">use class <code>table</code> inside table element</span>
                </div>
                <div class="card-body table-border-style">
                    <p>
                        <?= Html::a('Update', ['update', 'id_garis' => $model->id_garis], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id_garis' => $model->id_garis], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_garis',
                            'get_pasar',
                            'garisBujur',
                            'garisLintang',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>