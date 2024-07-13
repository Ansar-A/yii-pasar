<?php

use common\models\AuthItem;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AuthAssignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pcoded-content">

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Form Elements</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                        <li class="breadcrumb-item"><a href="#!">Form Elements</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Basic Component</h5>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?php
                    $list = User::find()->all();
                    echo $form->field($model, 'user_id')->dropDownList(
                        ArrayHelper::map(
                            $list,
                            'id',
                            function ($list) {
                                return $list->username;
                            },
                        ),
                        ['prompt' => 'Pilih...']
                    )->label('User') ?>
                    <?php
                    $result = AuthItem::find()
                        ->select(['name', 'type'])
                        ->where(['type' => 1]) // Ganti 'tipe_column' dengan nama kolom yang berisi tipe
                        ->limit(3)
                        ->all();
                    echo $form->field($model, 'item_name')->dropDownList(
                        ArrayHelper::map(
                            $result,
                            'name',
                            function ($result) {
                                return $result->name;
                            },
                        ),
                        ['prompt' => 'Pilih...']
                    )->label('Akses')
                    ?>


                    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>