<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Objetivos;

/**
 * ObjetivosSearch represents the model behind the search form of `backend\models\Objetivos`.
 */
class ObjetivosSearch extends Objetivos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_o', 'proyecto'], 'integer'],
            [['nombre', 'indicador'], 'safe'],
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
        $query = Objetivos::find();

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
            'id_o' => $this->id_o,
            'proyecto' => $this->proyecto,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'indicador', $this->indicador]);

        return $dataProvider;
    }
}
