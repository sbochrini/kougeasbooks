<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required', 'message' => 'Το πεδίο είναι υποχρεωτικό.'],
            // email has to be a valid email address
            [['email'], 'email','message' => 'Το πεδίο e-mail πρέπει να είναι έγκυρη ηλεκτρονική διεύθυνση.'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha','message' => ' Ο κωδικός επιβεβαίωσης δεν είναι σωστός.'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'name' => 'Ονοματεπώνυμο',
            'subject' => 'Θέμα',
            'body' => 'Κείμενο',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

                return true;
        }
        return false;
    }
}
