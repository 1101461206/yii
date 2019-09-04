<?php

namespace backend\models;

use common\components\Helper;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_permission_relation".
 *
 * @property int $role_permission_id
 * @property int $role_id 角色id
 * @property int $permission_id 权限id
 * @property string $create_time
 */
class UserPermissionRelation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_permission_relation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'permission_id'], 'required'],
            [['role_id', 'permission_id'], 'integer'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'role_permission_id' => 'Role Permission ID',
            'role_id' => 'Role ID',
            'permission_id' => 'Permission ID',
            'create_time' => 'Create Time',
        ];
    }

    public function role_all_def($role_id)
    {
        $info = UserPermissionRelation::find()
            ->select(['permission_id'])
            ->where(['role_id' => $role_id])
            ->asArray()
            ->all();
        $info = ArrayHelper::getColumn($info, 'permission_id');

        $role_all = Userpermission::find()
            ->select(['permission_id'])
            ->where(['type' => 0])
            ->asArray()
            ->orderBy('aort')
            ->all();

        foreach ($role_all as $v) {
            $role_all_info = Userpermission::find()
                ->select(['permission_id'])
                ->where(['pid' => $v['permission_id']])
                ->asArray()
                ->all();
            $role_all_info = ArrayHelper::getColumn($role_all_info, 'permission_id');
            $role_all_info = array_intersect($role_all_info, $info);
            if(!empty($role_all_info))
            {
                $new_role_all[$v['permission_id']]['list'] = $role_all_info;
                $new_role_all[$v['permission_id']]['pid'] = $v['permission_id'];
            }else{
                $new_role_all[$v['permission_id']]=array();
            }


        }
        unset($role_all);
//        echo "<pre>";
//        var_dump($new_role_all);
//        echo "<pre>";
//        exit;
        return $new_role_all;
    }


    /**
     * 授权
     */
    public function allinster($params)
    {
        if (!empty($params)) {
            $time = time();
            /**清除原有的授权*/
            $del = UserPermissionRelation::deleteAll(['role_id' => $params['role_id']]);

            foreach ($params['permission_id'] as $k => $v) {
                $data[] = array(
                    'role_id' => $params['role_id'],
                    'permission_id' => $v,
                    'create_time' => $time,
                );
            }
            /**更新授权*/
            $info = Yii::$app->db->createCommand()->batchInsert(UserPermissionRelation::tableName(), ['role_id', 'permission_id', 'create_time'], $data)->execute();
            return $info;
        }

    }


}
