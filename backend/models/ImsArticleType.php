<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_article_type".
 *
 * @property int $tid
 * @property string|null $name 类别
 */
class ImsArticleType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_article_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tid' => 'id',
            'name' => '名称',
        ];
    }
}
