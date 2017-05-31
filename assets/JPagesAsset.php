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
class JPagesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets\JPages\css\style.css',
        'assets\JPages\css\jPages.css',
        'assets\JPages\css\animate.css',
        'assets\JPages\css\github.css',
    ];
    public $js = [
        'assets\JPages\js\highlight.pack.js',
        'assets\JPages\js\tabifier.js',
        'assets\JPages\js\js.js',
        'assets\JPages\js\jPages.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
