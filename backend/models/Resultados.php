<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resultados".
 *
 * @property int $id_r
 * @property string $nombre
 * @property int $objetivo_e
 *
 * @property IndicadoresR[] $indicadoresRs
 * @property Objetivos $objetivoE
 */
class Resultados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resultados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'objetivo_e'], 'required'],
            [['objetivo_e'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['objetivo_e'], 'exist', 'skipOnError' => true, 'targetClass' => Objetivos::className(), 'targetAttribute' => ['objetivo_e' => 'id_o']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_r' => 'Id R',
            'nombre' => 'Nombre',
            'objetivo_e' => 'Objetivo E',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadoresRs()
    {
        return $this->hasMany(IndicadoresR::className(), ['resultado' => 'id_r']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetivoE()
    {
        return $this->hasOne(Objetivos::className(), ['id_o' => 'objetivo_e']);
    }
}
