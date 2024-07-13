<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "ablepro/dist/assets/images/favicon.ico",
        "ablepro/dist/assets/css/plugins/prism-coy.css",
        "ablepro/dist/assets/css/style.css",
    ];
    public $js = [
        "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js",
        "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js",

        "ablepro/dist/assets/js/vendor-all.min.js",
        "ablepro/dist/assets/js/plugins/bootstrap.min.js",
        "ablepro/dist/assets/js/ripple.js",
        "ablepro/dist/assets/js/pcoded.min.js",

        "ablepro/dist/assets/js/plugins/apexcharts.min.js",
        "ablepro/dist/assets/js/plugins/prism.js",
        "ablepro/assets/js/plugins/apexcharts.min.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
