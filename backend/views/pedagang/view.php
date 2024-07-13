<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Pedagang $model */

$this->title = $model->id_pedagang;
$this->params['breadcrumbs'][] = ['label' => 'Pedagangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a></li>
                        <li class="breadcrumb-item"><a href="#!">Basic Tables</a></li>
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
                    <?php if (\Yii::$app->user->can('SuperAdmin')) : ?>
                        <p>
                            <?= Html::a('Update', ['update', 'id_pedagang' => $model->id_pedagang], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id_pedagang' => $model->id_pedagang], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                    <?php else : ?>
                    <?php endif ?>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            // 'id_pedagang',
                            // [
                            //     'label' => 'Photo',
                            //     'format' => 'raw',
                            //     'value' => function ($model) {
                            //         return Html::img('@web/' . $model->photo, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                            //     }
                            // ],
                            'nama_pedangang',
                            'nik',
                            'alamat',
                            'tempat_jualan',
                            'jenis_jualan',
                            'omset_perbulan',
                            'keterangan',
                            [
                                'label' => 'Pasar',
                                'attribute' =>   'get_pasar',
                                'value' => function ($model) {
                                    return $model->getPasar->nama_pasar;
                                }
                            ]

                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>