<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_subcategory".
 *
 * @property string $subcat_id
 * @property string $subcat_name
 * @property integer $subcat_cat_id
 *
 * @property ΒοοκCategory $subcatCat
 */
class Subcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_subcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subcat_name', 'subcat_cat_id'], 'required'],
            [['subcat_cat_id'], 'integer'],
            [['subcat_name'], 'string', 'max' => 225],
            [['subcat_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookCategory::className(), 'targetAttribute' => ['subcat_cat_id' => 'cat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subcat_id' => 'Subcat ID',
            'subcat_name' => 'Υποκατηγορία',
            'subcat_cat_id' => 'Κατηγορία',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcatCat()
    {
        return $this->hasOne(BookCategory::className(), ['cat_id' => 'subcat_cat_id']);
    }
}
