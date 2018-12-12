<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Actividades;

/**
 * ActividadesSearch represents the model behind the search form of `backend\models\Actividades`.
 */
class ActividadesSearch extends Actividades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_a', 'proyecto', 'resultado', 'rrhh'], 'integer'],
            [['presupuestado'], 'number'],
            [['indicador', 'codigo_a', 'nombre', 'descripcion', 'recursos'], 'string'],
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
        $query = Actividades::find();

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
            'id_a' => $this->id_a,
            'codigo_a' => $this->codigo_a,
            'descripcion' => $this->descripcion,
            'recursos' => $this->recursos,
            'indicador' => $this->indicador,
            'presupuestado' => $this->presupuestado,
            'proyecto' => $this->proyecto,
            'resultado' => $this->resultado,
            'rrhh' => $this->rrhh,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
