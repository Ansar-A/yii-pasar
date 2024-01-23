<?php

/** @var yii\web\View $this */

use common\models\Pasar;
use common\models\Pedagang;
use common\models\User;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Url;

$this->title = 'My Yii Application';
$totalPedagang = Pedagang::find()->count();
$totalPasar = Pasar::find()->count();
$totalPengelola = User::find()->count();

$total = [];
foreach ($ts as $produk) {
    $total[] = $produk['total'];
}
$nama = [];
foreach ($namaPasar as $namaP) {
    $nama[] = $namaP->nama_pasar;
}
?>

<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Sistem Informasi Pengelolaan Data Pedagang Pasar</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-yellow"><?php echo $totalPasar ?></h4>
                                    <h6 class="text-muted m-b-0">Pasar</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart-2 f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-yellow">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"><a href=""><b class="text-white">more</b></a></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green"><?php echo $totalPengelola ?></h4>
                                    <h6 class="text-muted m-b-0">Operator</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-file-text f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"><a href=""><b class="text-white">more</b></a></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue"><?php echo $totalPedagang ?></h4>
                                    <h6 class="text-muted m-b-0">Pedagang</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-calendar f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"><a href=""><b class="text-white">more</b></a></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-5">
                    <div class="card latest-update-card">
                        <div class="card-header">
                            <h5>Latest Updates</h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="latest-update-box">
                                <div class="row p-t-30 p-b-30">
                                    <div class="col-auto text-right update-meta">
                                        <p class="text-muted m-b-0 d-inline-flex">2 hrs ago</p>
                                        <i class="feather icon-twitter bg-twitter update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6>+ 1652 Followers</h6>
                                        </a>
                                        <p class="text-muted m-b-0">You’re getting more and more followers, keep it up!</p>
                                    </div>
                                </div>
                                <div class="row p-b-30">
                                    <div class="col-auto text-right update-meta">
                                        <p class="text-muted m-b-0 d-inline-flex">4 hrs ago</p>
                                        <i class="feather icon-briefcase bg-c-red update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6>+ 5 New Products were added!</h6>
                                        </a>
                                        <p class="text-muted m-b-0">Congratulations!</p>
                                    </div>
                                </div>
                                <div class="row p-b-0">
                                    <div class="col-auto text-right update-meta">
                                        <p class="text-muted m-b-0 d-inline-flex">2 day ago</p>
                                        <i class="feather icon-facebook bg-facebook update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6>+1 Friend Requests</h6>
                                        </a>
                                        <p class="text-muted m-b-10">This is great, keep it up!</p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td class="b-none">
                                                            <a href="#!" class="align-middle">
                                                                <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                                                <div class="d-inline-block">
                                                                    <h6>Jeny William</h6>
                                                                    <p class="text-muted m-b-0">Graphic Designer</p>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Pie Charts</h5>
                        </div>
                        <div class="card-body" style="position: relative;">
                            <div id="pie-chart-1" style="width: 100%;">
                                <?php echo ChartJs::widget([
                                    'type' => 'doughnut',
                                    'options' => [
                                        'height' => 240,
                                        'width' => 500,
                                    ],
                                    'data' => [
                                        'radius' =>  "90%",
                                        'labels' => $nama,
                                        'datasets' => [
                                            [
                                                'label' => 'My First Dataset',
                                                'data' => $total,
                                                'backgroundColor' =>
                                                [
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 205, 86)',
                                                    'rgb(200, 205, 86)',
                                                    'rgb(190, 244, 86)',
                                                    'rgb(92, 205, 86)',
                                                ],
                                                'borderColor' =>  [
                                                    '#fff',
                                                    '#fff',
                                                    '#fff',
                                                    '#fff',
                                                    '#fff',
                                                    '#fff',
                                                ],
                                                'hoverOffset' => 6,
                                                'borderWidth' => 1,
                                                'hoverBorderColor' => ["#999", "#999", "#999", "#999", "#999", "#999"],
                                            ]
                                        ]
                                    ],
                                ]) ?>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 486px; height: 329px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>