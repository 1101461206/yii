<?php

namespace backend\models;

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
            [['created', 'is_delete'], 'integer'],
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
}
