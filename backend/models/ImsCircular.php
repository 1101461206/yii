<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_circular".
 *
 * @property int $id
 * @property string $fa 图标名称
 * @property string $title 标题
 * @property string $content 副标题
 * @property string $link 图片或跳转地址链接
 * @property int $type 是否跳转 0-否 1-是
 * @property string $img 图片地址
 */
class ImsCircular extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_circular';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['fa'], 'string', 'max' => 50],
            [['title', 'content', 'link','img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fa' => '图标',
            'title' => '标题',
            'content' => '内容',
            'link' => '链接',
            'type' => '类型',
            'img'=>'图片'
        ];
    }
}
