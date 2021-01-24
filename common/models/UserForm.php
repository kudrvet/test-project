<?php


namespace common\models;

use yii\base\Model;
use yii\db\ActiveRecord;
use himiklab\yii2\recaptcha\ReCaptchaValidator2;
class UserForm extends ActiveRecord
{

    public $reCaptcha;

    public function rules()
    {
        return [
            [['name','surname'], 'required'],
            [['name','surname'], 'string','min' => 3],
            [['name','surname'],'match','pattern' =>'/^[a-zа-яё\s]+$/iu'],

            ['email','required'],
            ['email','email'],

            ['phone','required'],
            ['text','required'],
            ['text','string','min'=>100],
//            [['reCaptcha'], ReCaptchaValidator2::className(),
//                'secret' => '6Ld3XTYaAAAAAAKwxt63H2eqyV8VwxsGtCW1tLVN',
//                'uncheckedMessage' => 'Please confirm that you are not a bot.'
//                ],

        ];
    }

    public static function tableName()
    {
        return 'user_form';
    }

    public function normalize ($value) {
        return ucfirst(strtolower($value));
    }
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $normalizedName  = $this->normalize($this->name);
        $normalizedSurname = $this->normalize($this->surname);
        $this->name = $normalizedName;
        $this->surname = $normalizedSurname;
        return true;
    }

}