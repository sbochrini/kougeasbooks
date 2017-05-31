<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_author".
 *
 * @property string $auth_id
 * @property string $auth_name
 *
 * @property Book[] $tblBooks
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_name'], 'required'],
            [['auth_name'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'auth_id' => 'Auth ID',
            'auth_name' => 'Συγγραφέας',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['bk_author_id' => 'auth_id']);
    }
}
