<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="">
    <?php $this->beginBody() ?>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <nav class="pcoded-navbar menu-light navbar-collapsed">
        <div class="navbar-wrapper">
            <div class="navbar-content scroll-div ps">
                <ul class="nav pcoded-inner-navbar">
                    <?php if (\Yii::$app->user->can('SuperAdmin')) : ?>
                        <li class="nav-item pcoded-menu-caption">
                            <label>DashBoard</label>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['site/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Data</label>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Data Pasar</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['pasar/index']) ?>">Pasar</a></li>
                                <li><a href="<?= Url::to(['garis/index']) ?>">Garis Lintang & Bujur</a></li>
                            </ul>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Data Pedagang</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['pedagang/index']) ?>">Pedagang</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item pcoded-menu-caption">
                            <label>Fungsional</label>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?= Url::to(['jabatan/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Jabatan</span></a>
                        </li> -->

                        <li class="nav-item pcoded-menu-caption">
                            <label>Data Instansi</label>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['instansi/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Instansi</span></a>
                        </li>

                        <li class="nav-item pcoded-menu-caption">
                            <label>Data User</label>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Data Admin</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['user/index']) ?>">User</a></li>
                                <li><a href="<?= Url::to(['auth-assignment/index']) ?>">Akses</a></li>
                                <!-- <li><a href="<?= Url::to(['auth-item/index']) ?>">Auth Item</a></li>
                                <li><a href="<?= Url::to(['auth-item-child/index']) ?>">Auth Item Child</a></li> -->
                            </ul>
                        </li>
                    <?php elseif (\Yii::$app->user->can('Admin')) : ?>
                        <li class="nav-item pcoded-menu-caption">
                            <label>DashBoard</label>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['site/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Data</label>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Data Pasar</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['pasar/index']) ?>">Pasar</a></li>
                                <li><a href="<?= Url::to(['garis/index']) ?>">Garis Lintang & Bujur</a></li>
                            </ul>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Data Pedagang</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['pedagang/index']) ?>">Pedagang</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item pcoded-menu-caption">
                            <label>Fungsional</label>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="<?= Url::to(['jabatan/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Jabatan</span></a>
                        </li> -->

                        <li class="nav-item pcoded-menu-caption">
                            <label>Data Instansi</label>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['instansi/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Instansi</span></a>
                        </li>

                        <li class="nav-item pcoded-menu-caption">
                            <label>Data User</label>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Data Admin</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['user/index']) ?>">User</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item pcoded-menu-caption">
                            <label>DashBoard</label>
                        </li>
                        <li class="nav-item">
                            <a href="<?= Url::to(['site/index']) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Data</label>
                        </li>

                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Data Pedagang</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['pedagang/index']) ?>">Pedagang</a></li>
                            </ul>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Data Pasar</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['pasar/index']) ?>">Pasar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Data User</label>
                        </li>
                        <li class="nav-item pcoded-hasmenu">
                            <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Data Admin</span></a>
                            <ul class="pcoded-submenu">
                                <li><a href="<?= Url::to(['user/index']) ?>">User</a></li>
                            </ul>
                        </li>
                    <?php endif ?>


                </ul>
            </div>
        </div>
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="m-header" style="padding-top: 25px;padding-left: 10px;">
            <a class="mobile-menu" id="mobile-collapse" href="#!" style="left: 220px;"><span></span></a>
            <a href="<?= Url::to(['site/index']) ?>" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <!-- <img src="<?= Url::to('@web/ablepro/dist/assets/images/logo.png') ?>" alt="" class="logo">
                <img src="<?= Url::to('@web/ablepro/dist/assets/images/logo-icon.png') ?>" alt="" class="logo-thumb"> -->
                <img src="<?= Url::to('@web/ablepro/dist/assets/images/logo2.png') ?>" alt="" class="img-fluid mb-4">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <!-- <ul class="navbar-nav mr-auto">
                <li class="nav-item" style="margin-left: 15px;">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </li>
            </ul> -->
            <ul class="navbar-nav ml-auto">
                <!-- <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body ps">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li> -->
                <li>
                    <p><?= Url::to(Yii::$app->user->identity->username) ?> [ <?= Url::to(Yii::$app->user->identity->level) ?> ]</p>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="<?= Url::to('@web/' . Yii::$app->user->identity->photo) ?>" class="img-radius" alt="User-Profile-Image">
                                <span><?= Url::to(Yii::$app->user->identity->username) ?></span>
                                <a href="<?= Url::to(['site/logout']) ?>" data-method='POST' class=" dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="<?= Url::to(['user/index']) ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <!-- <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li> -->
                                <!-- <li><a href="<?= Url::to(['site/logout']) ?>" data-method="post" class="dropdown-item"><i class="feather icon-lock"></i> Log Out</a></li> -->
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>

    <div class="pcoded-main-container">
        <?= $content ?>
    </div>

    <?php $this->endBody() ?>

</body>

</html>
<?php $this->endPage();
