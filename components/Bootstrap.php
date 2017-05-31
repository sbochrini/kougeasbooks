<?php
/**
 * Created by PhpStorm.
 * User: meae
 * Date: 23-Mar-17
 * Time: 12:40 PM
 */
namespace app\components;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // Here you can refer to Application object through $app variable
        $app->params['uploadPath'] = $app->basePath . '/web/img/';
        //$app->params['uploadUrl'] => $app->urlManager->baseUrl . '/uploads/';
    }
}
?>