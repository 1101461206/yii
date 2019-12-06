<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "awesome".
 *
 * @property int $id
 * @property string $name 名称
 * @property int $type 类别2-网络程序 3-易用 4-手型 5-交通 6-性别 7-文件 8-旋转 9-表单 10-支付 11-图表 12-货币 13-文本 14-方向 15-视频 16-商标 17-商业
 */
class Awesome extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'awesome';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }
}
