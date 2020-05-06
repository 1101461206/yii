<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_article_log".
 *
 * @property int $is
 * @property int|null $aid 文章ID
 * @property int|null $read 阅读
 * @property int|null $like 点赞
 */
class ImsArticleLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_article_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aid', 'read', 'like'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'is' => 'Is',
            'aid' => 'Aid',
            'read' => 'Read',
            'like' => 'Like',
        ];
    }
}
