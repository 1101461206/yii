<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ImsArticle;

/**
 * imsArticleSearch represents the model behind the search form of `backend\models\ImsArticle`.
 */
class imsArticleSearch extends ImsArticle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'article_category', 'article_date', 'article_readnum', 'article_likenum_v', 'article_likenum', 'article_readnum_v'], 'integer'],
            [['article_title', 'article_content', 'article_author'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ImsArticle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'article_category' => $this->article_category,
            'article_date' => $this->article_date,
            'article_readnum' => $this->article_readnum,
            'article_likenum_v' => $this->article_likenum_v,
            'article_likenum' => $this->article_likenum,
            'article_readnum_v' => $this->article_readnum_v,
        ]);

        $query->andFilterWhere(['like', 'article_title', $this->article_title])
            ->andFilterWhere(['like', 'article_content', $this->article_content])
            ->andFilterWhere(['like', 'article_author', $this->article_author]);

        return $dataProvider;
    }
}
