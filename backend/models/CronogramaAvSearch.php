<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CronogramaAv;

/**
 * CronogramaAvSearch represents the model behind the search form of `backend\models\CronogramaAv`.
 */
class CronogramaAvSearch extends CronogramaAv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ca', 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic', 'programados', 'actividad', 'proyecto', 'gestion'], 'integer'],
            [['total', 'avance'], 'number'],
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
        $query = CronogramaAv::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
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
            'id_ca' => $this->id_ca,
            'ene' => $this->ene,
            'feb' => $this->feb,
            'mar' => $this->mar,
            'abr' => $this->abr,
            'may' => $this->may,
            'jun' => $this->jun,
            'jul' => $this->jul,
            'ago' => $this->ago,
            'sep' => $this->sep,
            'oct' => $this->oct,
            'nov' => $this->nov,
            'dic' => $this->dic,
            'programados' => $this->programados,
            'total' => $this->total,
            'avance' => $this->avance,
            'gestion' => $this->gestion,
            'actividad' => $this->actividad,
            'proyecto' => $this->proyecto,
        ]);

        return $dataProvider;
    }

    public function searchByPro($params, $id)
    {
        $query = CronogramaAv::find()->where(['proyecto' => $id]);

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

        return $dataProvider;
    }

    public function searchByRes($params, $id_r)
    {
        $query = CronogramaAv::find()->where(['resultado' => $id_r]);

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

        return $dataProvider;
    }
}
