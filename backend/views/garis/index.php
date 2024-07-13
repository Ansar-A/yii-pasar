<?php

use common\models\Garis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\GarisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Garis';
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
                        <li class="breadcrumb-item"><a href="<?= Url::to(['site/home']) ?>">Home</a></li>
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
                        <?= Html::a('Create Garis', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); 
                    ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id_garis',
                            'get_pasar',
                            'garisBujur',
                            'garisLintang',
                            [
                                'class' => '\yii\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                                'header' => 'Action',
                                'headerOptions' => ['class' => 'text-center'],
                                'contentOptions' => ['style' => 'text-align:center'],
                                'buttons' => [
                                    // 'class' => 'btn btn-primary dropdown-toggle',
                                    'view' => function ($url, $model) {
                                        return Html::a('', ['view', 'id_garis' => $model->id_garis], [
                                            'class' => 'btn btn-sm btn-icon btn-outline-primary has-ripple feather icon-eye',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "View"
                                        ]);
                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('', ['update', 'id_garis' => $model->id_garis], [
                                            'class' => 'btn btn-sm btn-icon btn-outline-info has-ripple feather icon-edit-1',
                                            'data-toggle' => "tooltip",
                                            'data-placement' => "top",
                                            'title' => "",
                                            'data-original-title' => "Update"
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {

                                        return Html::a('', ['delete', 'id_garis' => $model->id_garis], [
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