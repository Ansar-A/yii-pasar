<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Pasar $model */

$this->title = $model->id_pasar;
$this->params['breadcrumbs'][] = ['label' => 'Pasars', 'url' => ['index']];
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
                        <?= Html::a('Update', ['update', 'id_pasar' => $model->id_pasar], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id_pasar' => $model->id_pasar], [
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
                            // 'id_pasar',
                            'nama_pasar',
                            'alamat',
                            [
                                'label' => 'Pengelola',
                                'attribute' => 'get_pengelola',
                                'value' => function ($model) {
                                    return $model->user->username;
                                }
                            ],
                            'no_telp',
                            [
                                'label' => 'Tahun Pembangunan',
                                'attribute' => 'thn_pembangunan',
                            ],
                            [
                                'label' => 'Tahun Renovasi',
                                'attribute' =>  'thn_renovasi',
                            ],
                            'garis_bujur',
                            'garis_lintang',
                            'kondisi_pasar',
                            'jml_dasaran_kios',
                            'jml_dasaran_los',
                            'kondisi_dasaran_kios',
                            'kondisi_dasaran_los',
                            'kapasitas_bangunan',
                            'luas_lahan',
                            'kepemilikan_lahan',
                            'unit_kerja_pengelola',
                            'legalitas_lahan',
                            'jumlah_pedagang',
                            'jumlah_pengunjung',
                            'omset_perbulan',
                            'keterangan',
                            [
                                'label' => 'Photo Depan',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img('@web/' . $model->photo_depan, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                                }
                            ],

                            [
                                'label' => 'Photo Belakang',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img('@web/' . $model->photo_belakang, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                                }
                            ],
                            [
                                'label' => 'Photo Kiri',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img('@web/' . $model->photo_kiri, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                                }
                            ],
                            [
                                'label' => 'Photo Kanan',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img('@web/' . $model->photo_kanan, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                                }
                            ],
                            [
                                'label' => 'Photo Dalam',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img('@web/' . $model->photo_dalam, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                                }
                            ],

                            [
                                'label' => 'Sertifikat',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $pdfUrl = Yii::getAlias('@web/' . $model->sertifikasi);
                                    return Html::a(
                                        'Lihat PDF',
                                        $pdfUrl,
                                        ['target' => '_blank']
                                    );
                                }
                            ],
                        ],
                    ]) ?>
                    <div class="form-group">

                        <?= Html::a('Kembali', ['pasar/index'], [
                            'class' => 'btn btn-outline-secondary has-ripple',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>