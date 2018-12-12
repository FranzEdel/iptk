<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Proyectos;

/**
 * ProyectosSearch represents the model behind the search form of `backend\models\Proyectos`.
 */
class ProyectosSearch extends Proyectos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_p', 'num_trabajadores', 'herramienta', 'programa'], 'integer'],
            [['codigo_p', 'nombre_p', 'objetivo_general', 'agencias', 'municipios', 'periodo', 'fecha_ini', 'fecha_fin', 'estado', 'responsable'], 'safe'],
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
        $query = Proyectos::find();

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
            'id_p' => $this->id_p,
            'fecha_ini' => $this->fecha_ini,
            'fecha_fin' => $this->fecha_fin,
            'num_trabajadores' => $this->num_trabajadores,
            'herramienta' => $this->herramienta,
            'programa' => $this->programa,
        ]);

        $query->andFilterWhere(['like', 'codigo_p', $this->codigo_p])
            ->andFilterWhere(['like', 'nombre_p', $this->nombre_p])
            ->andFilterWhere(['like', 'objetivo_general', $this->objetivo_general])
            ->andFilterWhere(['like', 'agencias', $this->agencias])
            ->andFilterWhere(['like', 'municipios', $this->municipios])
            ->andFilterWhere(['like', 'periodo', $this->periodo])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'responsable', $this->responsable]);

        return $dataProvider;
    }
}
