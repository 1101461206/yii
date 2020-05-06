<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ims_article".
 *
 * @property int $id
 * @property string|null $article_title 文章标题
 * @property string|null $article_content 文章内容
 * @property int|null $article_category 文章分类
 * @property int|null $article_date 发布时间
 * @property string|null $article_author 发布作者
 * @property int|null $article_readnum 阅读量
 * @property int|null $article_likenum_v 虚拟点赞数 
 * @property int|null $article_likenum 虚拟点赞数
 * @property int|null $article_readnum_v 虚拟阅读量
 * @property int|null $recommendation 是否推荐到首页 1-是 0-否
 * @property int|null $top 是否置顶 1-是 0-否
 * @property int|null $status 是否置顶 1-是 0-否
 */
class ImsArticle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ims_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_content'], 'string'],
            [['status','article_likenum_v','article_readnum_v','article_category','article_readnum','article_likenum','recommendation','top'],'integer'],
            [['article_title', 'article_author'], 'string', 'max' => 255],
            [['article_date'],'safe'],
            [['article_date'],'default','value'=>time()],
            [['article_title','article_content','article_category'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_title' => '文章标题',
            'article_content' => '文章内容',
            'article_category' => '文章分类',
            'article_date' => '发布时间',
            'article_readnum' => '阅读量',
            'article_likenum_v' => '虚拟点赞数',
            'article_likenum' => '点赞数',
            'article_readnum_v' => '虚拟阅读量',
            'recommendation' => '推到首页',
            'top' => '置顶',
            'article_author'=>'作者',
            'status'=>'状态',
        ];

    }

    public function getType()
    {
        return $this->hasOne(ImsArticleType::classname(),['tid'=>'article_category']);
    }


}
