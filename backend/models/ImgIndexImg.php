<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "img_index_img".
 *
 * @property int $id
 * @property string $img 图片
 * @property string $img_text 标题
 * @property string $img_content 详情
 * @property int $img_type 点击类型，1-放大图片 2-跳转页面
 * @property string $img_fa 图标
 * @property int $status 0-关闭 1-启用
 * @property string $link 跳转链接
 * @property int $creattime 创建时间
 */
class ImgIndexImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'img_index_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_type', 'status'], 'integer'],
            [['img', 'img_content','link'], 'string', 'max' => 255],
            [['img_text'], 'string', 'max' => 100],
            [['img_fa'], 'string', 'max' => 50],
            ['creattime','default','value'=>time()],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => '轮循图',
            'img_text' => '标题',
            'img_content' => '详情',
            'img_type' => '类型',
            'img_fa' => '图标',
            'status' => '状态',
            'link'=>'跳转链接',
            'creattime'=>'创建时间',
        ];
    }
}
