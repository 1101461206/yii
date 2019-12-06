<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_index".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $banner banner图片
 * @property string $banner_text_top banner主标题
 * @property string $banner_text_down banner副标题
 * @property string $propaganda 图片
 * @property string $propaganda_top_left 图标
 * @property string $propaganda_top_top 标题
 * @property string $propaganda_top_butter 介绍
 * @property string $propaganda_middle_left 图标
 * @property string $propaganda_middle_top 标题
 * @property string $propaganda_middle_butter 介绍
 * @property string $propaganda_down_left 图标
 * @property string $propaganda_down_top 标题
 * @property string $propaganda_down_butter 介绍
 * @property string $disseminate_top 宣传标题
 * @property string $disseminate_down 宣传文字
 */
class ImsIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_index';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['propaganda_top_butter', 'propaganda_middle_butter', 'propaganda_down_butter', 'disseminate_down'], 'string'],
            [['title', 'propaganda_top_left'], 'string', 'max' => 50],
            [['banner', 'banner_text_top', 'banner_text_down', 'propaganda', 'propaganda_top_top', 'propaganda_middle_left', 'propaganda_middle_top', 'propaganda_down_left', 'propaganda_down_top', 'disseminate_top'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'banner' => 'Banner图',
            'banner_text_top' => 'Banner主标题',
            'banner_text_down' => 'Banner副标题',
            'propaganda' => '宣传图片',
            'propaganda_top_left' => '第一个图标',
            'propaganda_top_top' => '第一个主标题',
            'propaganda_top_butter' => '第一个副标题',
            'propaganda_middle_left' => '第二个图标',
            'propaganda_middle_top' => '第二个主标题',
            'propaganda_middle_butter' => '第二个副标题',
            'propaganda_down_left' => '第三个图标',
            'propaganda_down_top' => '第三个主标题',
            'propaganda_down_butter' => '第三个副标题',
            'disseminate_top' => '宣传文字主标题',
            'disseminate_down' => '宣传文字副标题',
        ];
    }
}
