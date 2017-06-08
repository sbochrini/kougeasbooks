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
        /*'http://fonts.googleapis.com/css?family=Lato',
        'http://code.jquery.com/ui/1.12.0-rc.1/themes/smoothness/jquery-ui.css',*/
        'assets\jplist\dist\css\jplist.demo-pages.min.css',
        'assets\jplist\dist\css\jplist.jquery-ui-bundle.min.css',
        'assets\jplist\dist\css\jplist.textbox-filter.min.css',
        'assets\jplist\dist\css\jplist.pagination-bundle.min.css',
        'assets\jplist\dist\css\jplist.history-bundle.min.css',
        'assets\jplist\dist\css\jplist.filter-toggle-bundle.min.css',
        'assets\jplist\dist\css\jplist.list-grid-view.min.css',

    ];
    public $js = [
        'assets\jplist\dist\js\jplist.core.min.js',
        'assets\jplist\dist\js\jplist.sort-bundle.min.js',
        'assets\jplist\dist\js\jplist.textbox-filter.min.js',
        'assets\jplist\dist\js\jplist.pagination-bundle.min.js',
        'assets\jplist\dist\js\jplist.history-bundle.min.js',
        'assets\jplist\dist\js\jplist.filter-toggle-bundle.min.js',
        'assets\jplist\dist\js\jplist.list-grid-view.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'\app\assets\EshopperAsset'
    ];
}
