<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ImgIndexImg;

/**
 * imsindeximgSearch represents the model behind the search form of `backend\models\ImgIndexImg`.
 */
class ImsIndexImgSearch extends ImgIndexImg
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'img_type', 'status'], 'integer'],
            [['img', 'img_text', 'img_content', 'img_fa', 'link'], 'safe'],
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
        $query = ImgIndexImg::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
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
            'img_type' => $this->img_type,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'img_text', $this->img_text])
            ->andFilterWhere(['like', 'img_content', $this->img_content])
            ->andFilterWhere(['like', 'img_fa', $this->img_fa])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
