<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property string $salt 密码秘钥
 * @property string $nickname 昵称
 * @property string $thumb 头像
 * @property string $img 二维码
 * @property int $role 角色
 *
 */
class UserBackend extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['role','nickname','status'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => '密码',
            'email' => 'Email',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'verification_token' => 'Verification Token',
            'salt' => '秘钥',
            'nickname' => '昵称',
            'thumb' => '头像',
            'img' => '二维码',
            'role'=>'角色',
        ];
    }

    /**
     * @inheritdoc
     * 根据user表的主键（id）获取用户
     */

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id'=>$id]);
    }

    /**
     * @inheritdoc
     * 根据access_token获取用户，我们暂时先不实现，我们在文章 http://www.manks.top/yii2-restful-api.html 有过实现，如果你感兴趣的话可以先看看
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @inheritdoc
     * 用以标识 Yii::$app->user->id 的返回值
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     * 获取auth_key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     * 验证auth_key
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * 为model的password_hash字段生成密码的hash值
     *
     * @param string $password
     */
    public function setpass($pass,$salt)
    {
        $password=$pass.$salt;
        $this->password_hash=Yii::$app->security->generatePasswordHash($password);
    }

    static function newpass($pass,$salt){
        $password=$pass.$salt;
        return Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * 生成 "remember me" 认证key
     */
    public function setautkey()
    {
        $this->auth_key=Yii::$app->security->generateRandomString();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function getRole_name()
    {
        return $this->hasOne(Userrole::classname(),['roleid'=>'role']);
    }




}
