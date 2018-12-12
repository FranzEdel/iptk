<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Programas;

/**
 * ProgramasSearch represents the model behind the search form of `backend\models\Programas`.
 */
class ProgramasSearch extends Programas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pr'], 'integer'],
            [['codigo_pr', 'nombre', 'descripcion', 'objetivo'], 'safe'],
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
        $query = Programas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
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
            'id_pr' => $this->id_pr,
        ]);

        $query->andFilterWhere(['like', 'codigo_pr', $this->codigo_pr])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'objetivo', $this->objetivo]);

        return $dataProvider;
    }
}
