<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_news".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $subheading 副标题
 * @property int $status 状态
 * @property int $type 种类
 * @property int $creattime 创建时间
 * @property string $content 内容
 * @property int $recommend 是否推荐到首页
 * @property int $click 点击次数
 * @property int $fabulous 点赞吃次数
 */
class ImsNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'type', 'creattime', 'recommend', 'click', 'fabulous'], 'integer'],
            [['content'], 'string'],
            [['title', 'subheading'], 'string', 'max' => 255],
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
            'subheading' => '副标题',
            'status' => '状态',
            'type' => '类型',
            'creattime' => '创建时间',
            'content' => '内容',
            'recommend' => '推荐到首页',
            'click' => '点击数',
            'fabulous' => '点赞数',
        ];
    }
}
