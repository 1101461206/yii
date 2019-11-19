<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property string $user 操作人
 * @property string $type 操作类型
 * @property string $content 操作内容
 * @property int $creatime 操作时间
 * @property string $ip ip
 * @property int status
 */
class LogForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['creatime','status'], 'integer'],
            [['user', 'ip'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'type' => 'Type',
            'content' => 'Content',
            'creatime' => 'Creatime',
            'ip' => 'Ip',
            'status'=>'Status',
        ];
    }
}
