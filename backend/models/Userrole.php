<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property int $roleid
 * @property string $role_name 角色名称
 * @property int $created 创建时间
 * @property int is_delete 是否删除 1删除 0-有效
 */
class Userrole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_name', 'is_delete'], 'required'],
            [['created', 'is_delete'], 'integer'],
            // unique表示唯一性
            [['role_name'],'unique'],
            [['role_name'],'trim'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'roleid' => '',
            'role_name' => '角色',
            'created' => '创建时间',
            'is_delete' => '状态',
        ];
    }

    /**添加角色*/
    public function in_role($data)
    {
        if (!$this->validate()) {
            return null;
        }
        $role = new Userrole();
        $role->role_name = $data['Userrole']['role_name'];
        $role->is_delete = $data['Userrole']['is_delete'];
        $role->created = time();
        if ($role->save()) {
            $p_info = array();
            foreach ($data['permission_id'] as $k => $v) {
                $p_info[] = [$role->roleid, $v, time()];
            }
            $in = ['role_id', 'permission_id', 'create_time'];
            Yii::$app->db->createCommand()->batchInsert('user_permission_relation',$in,$p_info)->execute();
            return true;
        }else{
            return false;
        }

    }

    /**检测角色*/
    public function check_role($id){
        $user=new User();
        $data=array();
        $role_all = User::find()
            ->where(['role' => $id])
            ->count();
        if($role_all>0){
            return  false;
        }else{
            return true;
        }

        exit;
    }




}
