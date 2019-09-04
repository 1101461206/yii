<?php

namespace backend\models;

use yii;
use yii\base\Model;
use backend\models\UserBackend;

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
 * @property int $role
 */
class AdduserForm extends Model
{
    public $username;
    public $password_hash;
    public $created_at;
    public $updated_at;
    public $status;
    public $nickname;
    public $thumb;
    public $img;
    public $role;


    //https://www.yiichina.com/doc/guide/2.0/input-validation
    public function rules()
    {
        return [
            // 对username的值进行两边去空格过滤
            ['username', 'filter', 'filter' => 'trim'],
            // required表示必须的，也就是说表单提交过来的值必须要有, message 是username不满足required规则时给的提示消息
            [['username', 'password_hash','role'], 'required'],
            // unique表示唯一性，targetClass表示的数据模型 这里就是说UserBackend模型对应的数据表字段username必须唯一
            ['username','unique','targetClass'=>'\backend\models\UserBackend','message'=>'用户名存在'],
            // string 字符串，这里我们限定的意思就是username至少包含2个字符，最多255个字符
            ['username','string','min'=>2,'max'=>255],
            ['password_hash','string','min'=>6,'tooShort'=>'密码至少需要6位'],

            // default 默认在没有数据的时候才会进行赋值
            [['created_at','updated_at'],'default','value'=>time()],
            [['nickname','role','status'],'safe'],

        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password_hash' => '密码',
            'status' => '状态',
            'nickname'=>'昵称',
            'role'=>'角色',
            'img'=>'二维码',
            'thumb'=>'头像',

        ];
    }


    public function signup()
    {
        if(!$this->validate()){
            return null;
        }

        $user=new UserBackend();
        $user->salt=Yii::$app->getSecurity()->generateRandomString(6);
        $user->username=$this->username;
        $user->created_at=$this->created_at;
        $user->setpass($this->password_hash,$user->salt);
        $user->img=$this->img;
        $user->thumb=$this->thumb;
        $user->nickname=$this->nickname;
        $user->role=$this->role;
        $user->status=$this->status;
        $user->setautkey();
        // save(false)的意思是：不调用UserBackend的rules再做校验并实现数据入库操作
        // 这里这个false如果不加，save底层会调用UserBackend的rules方法再对数据进行一次校验，这是没有必要的。
        // 因为我们上面已经调用Signup的rules校验过了，这里就没必要再用UserBackend的rules校验了
        return $user->save(false);
    }






}