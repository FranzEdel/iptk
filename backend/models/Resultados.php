<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resultados".
 *
 * @property int $id_r
 * @property string $nombre
 * @property int $proyecto
 *
 * @property IndicadoresR[] $indicadoresRs
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
            [['nombre', 'proyecto'], 'required'],
            [['proyecto'], 'integer'],
            [['codigo_r'], 'string'],
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
            'codigo_r' => 'Código',
            'nombre' => 'Resultados',
            'proyecto' => 'Proyecto',
        ];
    }

    public function getCodNom()
    {
        return $this->codigo_r.' - '.$this->nombre;
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
        return $this->hasMany(CronogramaEj::className(), ['resultado' => 'id_r']);
    }

    public function getCronogramaAs()
    {
        return $this->hasMany(CronogramaAv::className(), ['resultado' => 'id_r']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }
}
