<?php

use common\models\Instansi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\InstansiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Instansis';
$this->params['breadcrumbs'][] = $this->title;
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
                    <p>
                        <?= Html::a('Create Instansi', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table-responsive table table-hover'
                        ],
                        'summary' => false,
                        'columns' => [
                            // [
                            //     'class' => 'yii\grid\SerialColumn',
                            //     'header' => 'No'
                            // ],

                            // 'id_instansi',
                            [
                                'header' => 'Photo',
                                'contentOptions' => ['style' => 'text-align:center'],
                                'headerOptions' => ['class' => 'text-center'],
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<center>' . Html::img('@web/' . $model->photo, ['style' => 'heigth: 50px; width:50px;', 'class' => 'img-responsive img-rounded']) . '</center>';
                                }
                            ],
                            'nama_instansi',
                            // 'alamat',
                            // 'no_telp',
                            'email:email',
                            [
                                'attribute' => 'website',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::a($model->website, $model->website, ['target' => '_blank']);
                                },
                            ],
                            'kepala_instansi',
                            //'visi_misi',
                            // 'status_hukum',
                            [
                                'contentOptions' => ['style' => 'text-align:center'],
                                'headerOptions' => ['class' => 'text-center'],
                                'class' => '\yii\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                                'header' => 'Action',
                                //'contentOptions' => ['style' => 'max-width:20px;'],
                                'buttons' => [
                                    // 'class' => 'btn btn-primary dropdown-toggle',
                                    'view' => function ($url, $model) {
                                        return Html::a('', ['view', 'id_instansi' => $model->id_instansi], [
                                            'class' => 'btn btn-sm btn-icon btn-outline-primary has-ripple feather icon-eye',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "View"
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('', ['update', 'id_instansi' => $model->id_instansi], [
                                            'class' => 'btn btn-sm btn-icon btn-outline-info has-ripple feather icon-edit-1',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "Update"
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {

                                        return Html::a('', ['delete', 'id_instansi' => $model->id_instansi], [
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

                </div>
            </div>
        </div>
    </div>
</div>