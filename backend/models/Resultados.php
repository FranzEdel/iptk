<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resultados".
 *
 * @property int $id_r
 * @property string $nombre
 * @property int $objetivo_e
 * @property int $proyecto
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
            [['nombre', 'objetivo_e', 'proyecto'], 'required'],
            [['objetivo_e', 'proyecto'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['objetivo_e'], 'exist', 'skipOnError' => true, 'targetClass' => Objetivos::className(), 'targetAttribute' => ['objetivo_e' => 'id_o']],
            [['proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['proyecto' => 'id_p']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_r' => 'Id R',
            'nombre' => 'RESULTADO A CONSEGUIR',
            'objetivo_e' => 'OBJETIVO',
            'proyecto' => 'Proyecto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadores()
    {
        return $this->hasMany(Indicadores::className(), ['resultado' => 'id_r']);
    }

    public function getActividades()
    {
        return $this->hasMany(Actividades::className(), ['resultado' => 'id_r']);
    }

    public function getCronogramaEs()
    {
        return $this->hasMany(CronogramaEj::className(), ['actividad' => 'id_a']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetivoE()
    {
        return $this->hasOne(Objetivos::className(), ['id_o' => 'objetivo_e']);
    }

    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }
}
