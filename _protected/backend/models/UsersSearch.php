<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Users;

/**
 * UsersSearch represents the model behind the search form of `backend\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Uid', 'ADid', 'USid', 'iduser'], 'integer'],
            [['Ufname', 'Ulname', 'Uemail', 'Uphone', 'Uimg'], 'safe'],
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
        $query = Users::find();

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
            'Uid' => $this->Uid,
            'ADid' => $this->ADid,
            'USid' => $this->USid,
            'iduser' => $this->iduser,
        ]);

        $query->andFilterWhere(['like', 'Ufname', $this->Ufname])
            ->andFilterWhere(['like', 'Ulname', $this->Ulname])
            ->andFilterWhere(['like', 'Uemail', $this->Uemail])
            ->andFilterWhere(['like', 'Uphone', $this->Uphone])
            ->andFilterWhere(['like', 'Uimg', $this->Uimg]);

        return $dataProvider;
    }
}
