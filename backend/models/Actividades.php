<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property int $id_a
 * @property string $nombre
 * @property int $indicador
 *
 * @property IndicadoresR $indicador0
 * @property CronogramaA[] $cronogramaAs
 * @property CronogramaE[] $cronogramaEs
 */
class Actividades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'indicador'], 'required'],
            [['indicador'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['indicador'], 'exist', 'skipOnError' => true, 'targetClass' => Indicadores::className(), 'targetAttribute' => ['indicador' => 'id_i']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_a' => 'Id A',
            'nombre' => 'Nombre',
            'indicador' => 'Indicador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicador0()
    {
        return $this->hasOne(Indicadores::className(), ['id_i' => 'indicador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCronogramaAs()
    {
        return $this->hasMany(CronogramaAv::className(), ['actividad' => 'id_a']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCronogramaEs()
    {
        return $this->hasMany(CronogramaEj::className(), ['actividad' => 'id_a']);
    }
}
