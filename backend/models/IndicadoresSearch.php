<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Indicadores;

/**
 * IndicadoresSearch represents the model behind the search form of `backend\models\Indicadores`.
 */
class IndicadoresSearch extends Indicadores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_i', 'proyecto', 'resultado'], 'integer'],
            [['codigo_i', 'fuente_verificacion'], 'string'],
            [['nombre'], 'safe'],
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
        $query = Indicadores::find();

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

        //$query->joinWith('resultado0');

        $query->andFilterWhere([
            'id_i' => $this->id_i,
            'codigo_i' => $this->codigo_i,
            'resultado' => $this->resultado,
            'proyecto' => $this->proyecto,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);
                //->andFilterWhere(['like', 'resultados.nombre', $this->resultado]);

        return $dataProvider;
    }
}
