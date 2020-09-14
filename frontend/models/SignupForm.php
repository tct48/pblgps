<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use aryelds\sweetalert\SweetAlert;

use kartik\alert\Alert;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $phone;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message'=>'กรุณากรอก ยูซเซอร์เนม'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'มียูซเซอร์เนมนี้แล้วในระบบ.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message'=>'กรุณากรอก อีเมลล์'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'มีอีเมลล์นี้แล้วในระบบ.'],

            ['password', 'required', 'message'=>'กรุณากรอก รหัสผ่าน'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['firstname', 'trim'],
            ['firstname', 'required', 'message'=>'กรุณากรอก ชื่อจริง'],
            ['lastname', 'trim'],
            ['lastname', 'required', 'message'=>'กรุณากรอก นามสกุล'],
            ['phone', 'trim'],
            ['phone', 'required', 'message'=>'กรุณากรอก เบอร์โทรศัพท์'],
            ['firstname', 'trim'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = 10;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
