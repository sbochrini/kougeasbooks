<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_order}}".
 *
 * @property string $order_id
 * @property string $usr_name
 * @property string $usr_surname
 * @property string $usr_phone
 * @property string $usr_email
 * @property string $usr_address
 * @property string $usr_city
 * @property string $usr_pcode
 * @property string $order_bk_id
 * @property string $order_comment
 *
 * @property TblBook $orderBk
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return '{{%tbl_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usr_name', 'usr_surname', 'usr_phone', 'order_bk_id', 'order_date'], 'required', 'message' => 'Το πεδίο είναι υποχρεωτικό.'],
            [['order_bk_id'],'required'],
            [['usr_email'],'email','message' => 'Το πεδίο e-mail πρέπει να είναι έγκυρη ηλεκρονική διεύθυνση.'],
            [['order_complete'], 'integer'],
            [['order_date'],'safe'],
            [['usr_pcode'],'number','message' => 'Το πεδίο Τ.Κ. πρέπει να είναι αριθμός.'],
            [['usr_phone'],'number','message' => 'Το πεδίο τηλέφωνο πρέπει να είναι αριθμός.'],
            [['usr_name', 'usr_surname', 'usr_email', 'usr_address', 'usr_city', 'order_comment','order_admin_comment'], 'string', 'max' => 225],
            [['order_bk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['order_bk_id' => 'bk_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'usr_name' => 'Όνομα',
            'usr_surname' => 'Επώνυμο',
            'usr_phone' => 'Τηλέφωνο',
            'usr_email' => 'E-mail',
            'usr_address' => 'Διεύθυνση',
            'usr_city' => 'Πόλη',
            'usr_pcode' => 'Τ.Κ.',
            'order_bk_id' => 'Βιβλίο',
            'order_date'=>'Ημερομηνία Παραγγελίας',
            'order_comment' => 'Σχόλιο Χρήστη',
            'order_complete' => 'Ολοκληρωμένη Παραγγελία',
            'order_admin_comment' => 'Σχόλιο διαχειριστή',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderBk()
    {
        return $this->hasOne(Book::className(), ['bk_id' => 'order_bk_id']);
    }
}
