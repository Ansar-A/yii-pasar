<?php

use common\models\Pasar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PasarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pasars';
$this->params['breadcrumbs'][] = $this->title;
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
                        <li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= Url::to(['pasar/index']) ?>">Data Pasar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Data Pasar</h5>
                    <span class="d-block m-t-5">Dinas Perdagangan dan Perindustrian Kabupaten Gowa</span>
                </div>
                <div class="card-body table-border-style">
                    <?php if (\Yii::$app->user->can('Admin')) : ?>
                        <p>
                            <?= Html::a('Create Pasar', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    <?php else : ?>
                    <?php endif ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>


                    <?php if (\Yii::$app->user->can('SuperAdmin')) : ?>
                        <!-- SuperAdmin yang bisa update dan delete -->
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'tableOptions' => [
                                'class' => 'table-responsive table table-hover'
                            ],
                            'summary' => false,
                            'columns' => [
                                [
                                    'class' => 'yii\grid\SerialColumn',
                                    'header' => 'No'
                                ],
                                // 'id_pasar',
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'nama_pasar',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'header' => 'Photo',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        return '<center>' . Html::img('@web/' . $model->photo_depan, ['style' => 'heigth: 70px; width:70px;', 'class' => 'img-responsive img-rounded']) . '</center>';
                                    }
                                ],
                                // [
                                //     'filterInputOptions' => [
                                //         'class'       => 'form-control',
                                //         'placeholder' => 'Search...',
                                //     ],
                                //     'attribute' => 'alamat',
                                //     'contentOptions' => ['style' => 'text-align:center'],
                                //     'headerOptions' => ['class' => 'text-center'],
                                // ],

                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'get_pengelola',
                                    'value' => function ($model) {
                                        return $model->user->username;
                                    },
                                    'label' => 'Pengelola',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'no_telp',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                // [
                                //     'label' => 'Sertifikat',
                                //     'format' => 'raw',
                                //     'value' => function ($model) {
                                //         $pdfUrl = Yii::getAlias('@web/' . $model->sertifikasi);
                                //         return Html::a(
                                //             'Lihat PDF',
                                //             $pdfUrl,
                                //             ['target' => '_blank']
                                //         );
                                //     }
                                // ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'luas_lahan',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'kepemilikan_lahan',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                //'thn_pembangunan',
                                //'thn_renovasi',
                                //'garis_bujur',
                                //'garis_lintang',
                                //'kondisi_pasar',
                                //'jml_dasaran_kios',
                                //'jml_dasaran_los',
                                //'kondisi_dasaran_kios',
                                //'kondisi_dasaran_los',
                                //'kapasitas_bangunan',
                                //'unit_kerja_pengelola',
                                //'legalitas_lahan',
                                //'jumlah_pedagang',
                                //'jumlah_pengunjung',
                                //'omset_perbulan',
                                //'keterangan',
                                //'photo_depan',
                                //'photo_belakang',
                                //'photo_kiri',
                                //'photo_kanan',
                                //'photo_dalam',
                                [
                                    'headerOptions' => ['class' => 'text-center'], 'contentOptions' => ['style' => 'text-align:center'],
                                    'class' => '\yii\grid\ActionColumn',
                                    'template' => '{view} {update} {delete}',
                                    'header' => 'Action',
                                    //'contentOptions' => ['style' => 'max-width:20px;'],
                                    'buttons' => [
                                        // 'class' => 'btn btn-primary dropdown-toggle',
                                        'view' => function ($url, $model) {
                                            return Html::a('', ['view', 'id_pasar' => $model->id_pasar], [
                                                'class' => 'btn btn-sm btn-icon btn-outline-primary has-ripple feather icon-eye',
                                                'data-toggle' => "tooltip",
                                                'data-placement' => "top",
                                                'title' => "",
                                                'data-original-title' => "View"
                                            ]);
                                        },
                                        'update' => function ($url, $model) {
                                            return Html::a('', ['update', 'id_pasar' => $model->id_pasar], [
                                                'class' => 'btn btn-sm btn-icon btn-outline-info has-ripple feather icon-edit-1',
                                                'data-toggle' => "tooltip",
                                                'data-placement' => "top",
                                                'title' => "",
                                                'data-original-title' => "Update"
                                            ]);
                                        },
                                        'delete' => function ($url, $model) {

                                            return Html::a('', ['delete', 'id_pasar' => $model->id_pasar], [
                                                'class' => 'btn btn-sm btn-icon btn-outline-danger has-ripple feather icon-x-square',
                                                'data-toggle' => "tooltip",
                                                'data-placement' => "top",
                                                'title' => "",
                                                'data-original-title' => "Delete",
                                                'data' => [
                                                    'confirm' => 'Apakah Anda yakin ingin menghapus item ini?',
                                                    'method' => 'post',
                                                ],
                                            ]);
                                        },
                                    ],
                                ],
                            ],
                        ]); ?>
                    <?php elseif (\Yii::$app->user->can('Admin')) : ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'tableOptions' => [
                                'class' => 'table-responsive table table-hover'
                            ],
                            'summary' => false,
                            'columns' => [
                                [
                                    'class' => 'yii\grid\SerialColumn',
                                    'header' => 'No'
                                ],
                                // 'id_pasar',
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'nama_pasar',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'header' => 'Photo',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        return '<center>' . Html::img('@web/' . $model->photo_depan, ['style' => 'heigth: 70px; width:70px;', 'class' => 'img-responsive img-rounded']) . '</center>';
                                    }
                                ],
                                // [
                                //     'filterInputOptions' => [
                                //         'class'       => 'form-control',
                                //         'placeholder' => 'Search...',
                                //     ],
                                //     'attribute' => 'alamat',
                                //     'contentOptions' => ['style' => 'text-align:center'],
                                //     'headerOptions' => ['class' => 'text-center'],
                                // ],

                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'get_pengelola',
                                    'value' => function ($model) {
                                        return $model->user->username;
                                    },
                                    'label' => 'Pengelola',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'no_telp',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                // [
                                //     'label' => 'Sertifikat',
                                //     'format' => 'raw',
                                //     'value' => function ($model) {
                                //         $pdfUrl = Yii::getAlias('@web/' . $model->sertifikasi);
                                //         return Html::a(
                                //             'Lihat PDF',
                                //             $pdfUrl,
                                //             ['target' => '_blank']
                                //         );
                                //     }
                                // ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'luas_lahan',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'kepemilikan_lahan',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                //'thn_pembangunan',
                                //'thn_renovasi',
                                //'garis_bujur',
                                //'garis_lintang',
                                //'kondisi_pasar',
                                //'jml_dasaran_kios',
                                //'jml_dasaran_los',
                                //'kondisi_dasaran_kios',
                                //'kondisi_dasaran_los',
                                //'kapasitas_bangunan',
                                //'unit_kerja_pengelola',
                                //'legalitas_lahan',
                                //'jumlah_pedagang',
                                //'jumlah_pengunjung',
                                //'omset_perbulan',
                                //'keterangan',
                                //'photo_depan',
                                //'photo_belakang',
                                //'photo_kiri',
                                //'photo_kanan',
                                //'photo_dalam',
                                [
                                    'headerOptions' => ['class' => 'text-center'], 'contentOptions' => ['style' => 'text-align:center'],
                                    'class' => '\yii\grid\ActionColumn',
                                    'template' => '{view}',
                                    'header' => 'Action',
                                    //'contentOptions' => ['style' => 'max-width:20px;'],
                                    'buttons' => [
                                        // 'class' => 'btn btn-primary dropdown-toggle',
                                        'view' => function ($url, $model) {
                                            return Html::a('', ['view', 'id_pasar' => $model->id_pasar], [
                                                'class' => 'btn btn-sm btn-icon btn-outline-primary has-ripple feather icon-eye',
                                                'data-toggle' => "tooltip",
                                                'data-placement' => "top",
                                                'title' => "",
                                                'data-original-title' => "View"
                                            ]);
                                        },

                                    ],
                                ],
                            ],
                        ]); ?>
                    <?php else : ?>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'tableOptions' => [
                                'class' => 'table-responsive table table-hover'
                            ],
                            'summary' => false,
                            'columns' => [
                                // 'id_pasar',
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'nama_pasar',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'header' => 'Photo',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        return '<center>' . Html::img('@web/' . $model->photo_depan, ['style' => 'heigth: 70px; width:70px;', 'class' => 'img-responsive img-rounded']) . '</center>';
                                    }
                                ],
                                // [
                                //     'filterInputOptions' => [
                                //         'class'       => 'form-control',
                                //         'placeholder' => 'Search...',
                                //     ],
                                //     'attribute' => 'alamat',
                                //     'contentOptions' => ['style' => 'text-align:center'],
                                //     'headerOptions' => ['class' => 'text-center'],
                                // ],

                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'get_pengelola',
                                    'value' => function ($model) {
                                        return $model->user->username;
                                    },
                                    'label' => 'Pengelola',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'no_telp',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                // [
                                //     'label' => 'Sertifikat',
                                //     'format' => 'raw',
                                //     'value' => function ($model) {
                                //         $pdfUrl = Yii::getAlias('@web/' . $model->sertifikasi);
                                //         return Html::a(
                                //             'Lihat PDF',
                                //             $pdfUrl,
                                //             ['target' => '_blank']
                                //         );
                                //     }
                                // ],
                                // [
                                //     'filterInputOptions' => [
                                //         'class'       => 'form-control',
                                //         'placeholder' => 'Search...',
                                //     ],
                                //     'attribute' => 'luas_lahan',
                                //     'contentOptions' => ['style' => 'text-align:center'],
                                //     'headerOptions' => ['class' => 'text-center'],
                                // ],
                                [
                                    'filterInputOptions' => [
                                        'class'       => 'form-control',
                                        'placeholder' => 'Search...',
                                    ],
                                    'attribute' => 'kepemilikan_lahan',
                                    'contentOptions' => ['style' => 'text-align:center'],
                                    'headerOptions' => ['class' => 'text-center'],
                                ],
                                //'thn_pembangunan',
                                //'thn_renovasi',
                                //'garis_bujur',
                                //'garis_lintang',
                                //'kondisi_pasar',
                                //'jml_dasaran_kios',
                                //'jml_dasaran_los',
                                //'kondisi_dasaran_kios',
                                //'kondisi_dasaran_los',
                                //'kapasitas_bangunan',
                                //'unit_kerja_pengelola',
                                //'legalitas_lahan',
                                //'jumlah_pedagang',
                                //'jumlah_pengunjung',
                                //'omset_perbulan',
                                //'keterangan',
                                //'photo_depan',
                                //'photo_belakang',
                                //'photo_kiri',
                                //'photo_kanan',
                                //'photo_dalam',
                                [
                                    'headerOptions' => ['class' => 'text-center'], 'contentOptions' => ['style' => 'text-align:center'],
                                    'class' => '\yii\grid\ActionColumn',
                                    'template' => '{view}',
                                    'header' => 'Action',
                                    //'contentOptions' => ['style' => 'max-width:20px;'],
                                    'buttons' => [
                                        // 'class' => 'btn btn-primary dropdown-toggle',
                                        'view' => function ($url, $model) {
                                            return Html::a('', ['view', 'id_pasar' => $model->id_pasar], [
                                                'class' => 'btn btn-sm btn-icon btn-outline-primary has-ripple feather icon-eye',
                                                'data-toggle' => "tooltip",
                                                'data-placement' => "top",
                                                'title' => "",
                                                'data-original-title' => "View"
                                            ]);
                                        },
                                    ],
                                ],
                            ],
                        ]); ?>
                    <?php endif ?>


                </div>
            </div>
        </div>
    </div>
</div>