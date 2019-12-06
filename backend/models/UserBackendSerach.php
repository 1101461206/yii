<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserBackend;

/**
 * UserBackendSerach represents the model behind the search form of `backend\models\UserBackend`.
 */
class UserBackendSerach extends UserBackend
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'role', 'nickname', 'salt', 'status'], 'safe'],
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
        $query = UserBackend::find();

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

//        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
//        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['=', 'status', $this->status])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
//            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['=', 'role', $this->role]);
        /**打印sql*/
//        echo $query->createCommand()->getRawSql();
//        exit;
        return $dataProvider;
    }
}
