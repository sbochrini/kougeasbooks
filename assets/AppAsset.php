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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.css'

    ];
    public $js = [
       //'assets\js\jquery-3.1.1.min.js'
        //'https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
