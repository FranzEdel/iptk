<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "actividades".
 *
 * @property int $id_a
 * @property string $nombre
 * @property string $presupuestado
 * @property int $indicador
 * @property int $proyecto
 * @property int $objetivo
 * @property int $resultado
 * @property int $rrhh
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
            [['nombre', 'presupuestado', 'indicador', 'proyecto', 'objetivo', 'resultado', 'rrhh'], 'required'],
            [['presupuestado'], 'number'],
            [['indicador', 'proyecto', 'objetivo', 'resultado', 'rrhh'], 'integer'],
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
            'presupuestado' => 'Presupuestado',
            'indicador' => 'Indicador',
            'proyecto' => 'Proyecto',
            'objetivo' => 'Objetivo',
            'resultado' => 'Resultado',
            'rrhh' => 'Rrhh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }

    public function getObjetivo0()
    {
        return $this->hasOne(Objetivos::className(), ['id_o' => 'objetivo']);
    }

    public function getResultado0()
    {
        return $this->hasOne(Resultados::className(), ['id_r' => 'resultado']);
    }

    public function getIndicador0()
    {
        return $this->hasOne(Indicadores::className(), ['id_i' => 'indicador']);
    }

    public function getRecursoHumano0()
    {
        return $this->hasOne(RecursosHumanos::className(), ['id_rh' => 'rrhh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCronogramaAs()
    {
        return $this->hasMany(CronogramaA::className(), ['actividad' => 'id_a']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCronogramaEs()
    {
        return $this->hasMany(CronogramaE::className(), ['actividad' => 'id_a']);
    }
}
