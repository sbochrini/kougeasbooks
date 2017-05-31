<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_category".
 *
 * @property integer $cat_id
 * @property string $cat_name
 * @property integer $cat_subcat
 *
 * @property TblBook[] $tblBooks
 */
class BookCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $subcat;

    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'required', 'message' => 'Το πεδίο είναι υποχρεωτικό.'],
            [['cat_subcat'], 'integer'],
            [['cat_name','subcat'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Κατηγορία',
            'cat_name' => 'Κατηγορία',
            'cat_subcat' => 'Υποκατηγορία',
            'subcat'=>'Υποκατηγορία',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['bk_cat_id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategories()
    {
        return $this->hasMany(Subcategory::className(), ['subcat_cat_id' => 'cat_id']);
    }

}
