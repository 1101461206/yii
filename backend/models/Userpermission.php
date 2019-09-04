<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "user_permission".
 *
 * @property int $permission_id
 * @property string $permission_name 权限名称
 * @property string $permission_route 路由
 * @property int $pid 父id
 * @property int $aort 排序编号
 * @property int $type 类型，0菜单 1按钮
 * @property int $create_time
 * @property int $update
 * @property int $is_delete 0是 1否
 */
class Userpermission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_permission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'aort', 'type', 'create_time', 'update', 'is_delete'], 'integer'],
            [['permission_name'], 'string', 'max' => 50],
            [['permission_route'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'permission_id' => 'ID',
            'permission_name' => '权限名称',
            'permission_route' => '权限路由',
            'pid' => '父ID',
            'aort' => '排序编号',
            'type' => '类型',
            'create_time' => '创建时间',
            'update' => '更新时间',
            'is_delete' => '状态',
        ];
    }

    /**
     * 查询全部权限
     */
    public function role_all()
    {
        $role_array = array();
        $role_all = Userpermission::find()
            ->where(['type' => 0])
            ->orderBy('aort')
            ->all();
        foreach ($role_all as $v) {
            $role_array[$v->permission_id] = array(
                    'p_info'=>array(
                        $v->permission_id=>$v->permission_name,
                    ),
                    'pid'=>$v->permission_id,
              );
        }
        foreach ($role_array as $k => $v) {
            $role_list = Userpermission::find()
                ->select(['permission_name', 'permission_id','type'])
                ->where(['pid' => $k])
                ->orderBy('aort')
                ->asArray()
                ->all();
            $role_list=ArrayHelper::map($role_list,'permission_id','permission_name');

            $role_array[$k]['list'] = $role_list;
        }


        return $role_array;
    }


}
