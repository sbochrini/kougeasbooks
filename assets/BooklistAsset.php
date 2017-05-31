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
class BooklistAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'assets\jplist\dist\css\jplist.core.min.css',
        'assets\jplist\dist\css\jplist.textbox-filter.min.css',
        'assets\jplist\dist\css\jplist.pagination-bundle.min.css',
        //'https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.css'

    ];
    public $js = [
//        'assets\jplist\dist\js\lib\require.js',
        'assets\jplist\dist\js\jplist.core-ajax.min.js',
        'assets\jplist\dist\js\jplist.sort-bundle.min.js',
        'assets\jplist\dist\js\jplist.pagination-bundle.min.js',
        'assets\jplist\dist\js\jplist.textbox-filter.min.js',
        //'assets\js\jquery-3.1.1.min.js'
        //'https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
