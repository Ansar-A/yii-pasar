<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
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
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                            'id',
                            'username',
                            [
                                'label' => 'Photo',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::img('@web/' . $model->photo, ['style' => 'width:150px;', 'class' => 'img-responsive img-rounded']);
                                }
                            ],
                            'nik',
                            'alamat',
                            'level',
                            // 'auth_key',
                            // 'password_hash',
                            // 'password_reset_token',
                            'email:email',
                            'status',
                            // 'created_at',
                            // 'updated_at',
                            // 'verification_token',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>