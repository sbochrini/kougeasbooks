<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_book".
 *
 * @property string $bk_id
 * @property string $bk_title
 * @property string $bk_author_id
 * @property integer $bk_cat_id
 * @property string $bk_subcat_id
 * @property string $bk_publisher
 * @property string $bk_pb_place
 * @property string $bk_pb_year
 * @property string $bk_pages
 * @property string $bk_price
 * @property string $bk_description
 * @property string $bk_condition
 * @property string $bk_grouping
 *
 * @property Author $bkAuthor
 * @property Category $bkCat
 * @property Order[] $tblOrders
 */
class Book extends \yii\db\ActiveRecord
{
    public $image;
    const  NO_AUTHOR='-';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bk_title', 'bk_cat_id'], 'required', 'message' => 'Το πεδίο είναι υποχρεωτικό.'],
            [['bk_author_id', 'bk_cat_id'], 'integer'],
            [['bk_pb_year'], 'safe'],
            [['bk_price'],'number','message' => 'Το πεδίο Τιμή πρέπει να είναι αριθμός.'],
            //[['bk_pb_year'],'number','message' => 'Το πεδίο Έτος Έκδοσης πρέπει να είναι αριθμός.'],
            //[['bk_price','bk_pb_year'], 'number'],
            //[['bk_pages'],'integer'],
            [['bk_condition'], 'string'],
            [['bk_title', 'bk_publisher', 'bk_pb_place',  'bk_grouping'], 'string', 'max' => 225],
            [['bk_description'], 'string', 'max' => 1000],
            [['bk_author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['bk_author_id' => 'auth_id']],
            [['bk_cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookCategory::className(), 'targetAttribute' => ['bk_cat_id' => 'cat_id']],
            [['bk_subcat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::className(), 'targetAttribute' => ['bk_subcat_id' => 'subcat_id']],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['bk_image_src_filename'], 'string', 'max' => 255],
            [['bk_image_web_filename'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bk_id' => 'Bk ID',
            'bk_title' => 'Τίτλος',
            'bk_author_id' => 'Συγγραφέας',
            'bk_cat_id' => 'Κατηγορία',
            'bk_subcat_id' => 'Υποκατηγορία',
            'bk_publisher' => 'Εκδότης',
            'bk_pb_place' => 'Τόπος Έκδοσης',
            'bk_pb_year' => 'Έτος Έκδοσης',
            'bk_pages' => 'Σελίδες',
            'bk_price' => 'Τιμή',
            'bk_description' => 'Περιγραφή',
            'bk_condition' => 'Κατάσταση',
            'bk_grouping' => 'Ομαδοποίηση',
            'bk_image_src_filename' =>'Εικόνα',
            'bk_image_web_filename' => 'Pathname',
            'image'=>"Εικόνα"
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBkAuthor()
    {
        return $this->hasOne(Author::className(), ['auth_id' => 'bk_author_id']);
    }

    public function getBkAuthorName()
    {
        return $this->author->auth_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBkCat()
    {
        return $this->hasOne(BookCategory::className(), ['cat_id' => 'bk_cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBkSubcat()
    {
        return $this->hasOne(Subcategory::className(), ['subcat_id' => 'bk_subcat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['order_bk_id' => 'bk_id']);
    }
}
