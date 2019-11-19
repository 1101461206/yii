<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\UserBackend as User;
use yii\captcha\Captcha;

/**
 * Login form
 */
class BackLoginForm extends Model
{
    public $username;
    public $password_hash;
    public $rememberMe = true;
    public $verifyCode;
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password_hash','verifyCode'], 'required'],
            ['verifyCode', 'captcha','captchaAction'=>'backsite/captcha','message'=>'验证码不正确'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password_hash', 'validatePassword'],


        ];
    }

    public function attributeLabels()
    {
        return [
            'username'=>'用户名',
            'password_hash'=>'密码',
            'verifyCode'=>'验证码',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $pass=$this->password_hash.$user->salt;

            if (!$user || !$user->validatePassword($pass)) {
                $this->addError($attribute, '密码或用户名错误.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }


}
