<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CronogramaEj;

/**
 * CronogramaEjSearch represents the model behind the search form of `backend\models\CronogramaEj`.
 */
class CronogramaEjSearch extends CronogramaEj
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ce', 'recursos_h', 'actividad'], 'integer'],
            [['item'], 'safe'],
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'], 'number'],
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
        $query = CronogramaEj::find();

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
            'id_ce' => $this->id_ce,
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
            'recursos_h' => $this->recursos_h,
            'actividad' => $this->actividad,
        ]);

        $query->andFilterWhere(['like', 'item', $this->item]);

        return $dataProvider;
    }

    public function searchByPro($params, $id_p)
    {
        $query = CronogramaEj::find()->where(['proyecto' => $id_p]);

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

    public function searchByObj($params, $id_o)
    {
        $query = CronogramaEj::find()->where(['objetivo' => $id_o]);

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
