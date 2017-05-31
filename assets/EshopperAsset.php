<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EshopperAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'css/eshopper/prettyPhoto.css',
        'css/eshopper/price-range.css',
        'css/eshopper/animate.css',
        'css/eshopper/main.css',
        'css/eshopper/responsive.css',

    ];
    public $js = [
        'assets/js/eshopper/jquery.scrollUp.min.js',
        'assets/js/eshopper/price-range.js',
        'assets/js/eshopper/jquery.prettyPhoto.js',
        'assets/js/eshopper/main.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
