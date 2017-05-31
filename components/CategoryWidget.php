<?php
namespace app\components;

use app\models\BookCategory;
use Yii;
use yii\base\Widget;
/**
 * Created by PhpStorm.
 * User: Voula
 * Date: 18/4/2017
 * Time: 11:09 μμ
 */


class CategoryWidget extends Widget {

    public function run() {
        $categories = BookCategory::find()->all();;

      return $this->render('bookcategory', array(
            'categories'=>$categories
        ));
    }
}