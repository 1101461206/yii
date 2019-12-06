<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        //  <!-- Favicons -->
        'img/favicon.png',
        'img/apple-touch-icon.png',
        // <!-- Google Fonts -->
        'https://fonts.googleapis.com/css?family=Ruda:400,900,700',
        //<!-- Bootstrap CSS File -->
        'lib/bootstrap/css/bootstrap.min.css',
        // <!-- Libraries CSS Files -->
        'lib/font-awesome/css/font-awesome.min.css',
        'lib/prettyphoto/css/prettyphoto.css',
        'lib/hover/hoverex-all.css',
        'lib/jetmenu/jetmenu.css',
        'lib/owl-carousel/owl-carousel.css',
        //  <!-- Main Stylesheet File -->
        'css/style.css',
        'css/colors/blue.css',
    ];
    public $js = [
        //<!-- JavaScript Libraries -->
        'lib/jquery/jquery.min.js',
        'lib/bootstrap/js/bootstrap.min.js',
        'lib/php-mail-form/validate.js',
        'lib/prettyphoto/js/prettyphoto.js',
        'lib/isotope/isotope.min.js',
        'lib/hover/hoverdir.js',
        'lib/hover/hoverex.min.js',
        'lib/unveil-effects/unveil-effects.js',
        'lib/owl-carousel/owl-carousel.js',
        'lib/jetmenu/jetmenu.js',
        'lib/animate-enhanced/animate-enhanced.min.js',
        'lib/jigowatt/jigowatt.js',
        'lib/easypiechart/easypiechart.min.js',
        //<!-- Template Main Javascript File -->
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
