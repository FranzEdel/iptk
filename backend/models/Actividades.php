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
            [['nombre', 'presupuestado', 'proyecto', 'resultado', 'rrhh'], 'required'],
            ['presupuestado', 'exist', 'targetClass' => '\app\models\Proyecto', 'targetAttribute' => 'presupuesto'],
            [['presupuestado'], 'number', 'min' => '0', 'max' => $this->maxVal],
            [['proyecto', 'resultado', 'rrhh'], 'integer'],
            [['codigo_a','nombre', 'indicador', 'descripcion', 'recursos'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_a' => 'Id A',
            'codigo_a' => 'Código',
            'nombre' => 'Nombre',
            'indicador' => 'Indicador',
            'descripcion' => 'Descripcion',
            'recursos' => 'Recursos',
            'presupuestado' => 'Costo($us)',
            'proyecto' => 'Proyecto',
            'resultado' => 'Resultado',
            'rrhh' => 'Rrhh',
        ];
    }

    public function getMaxVal(){
        $presu = round(($this->proyecto0['presupuesto'] / 6.97), 2);
        return $presu;
    }

    public function getCodNom()
    {
        return $this->codigo_a.' - '.$this->nombre;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }

    public function getResultado0()
    {
        return $this->hasOne(Resultados::className(), ['id_r' => 'resultado']);
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
