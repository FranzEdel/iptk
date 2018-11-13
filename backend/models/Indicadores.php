<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "indicadores_r".
 *
 * @property int $id_i
 * @property string $nombre
 * @property int $resultado
 * @property int $proyecto
 * @property int $objetivo
 *
 * @property Actividades[] $actividades
 * @property Resultados $resultado0
 */
class Indicadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicadores_r';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'resultado', 'proyecto', 'objetivo'], 'required'],
            [['resultado', 'proyecto', 'objetivo'], 'integer'],
            [['nombre'], 'string', 'max' => 200],
            [['resultado'], 'exist', 'skipOnError' => true, 'targetClass' => Resultados::className(), 'targetAttribute' => ['resultado' => 'id_r']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_i' => 'Id I',
            'nombre' => 'Nombre',
            'resultado' => 'Resultado',
            'proyecto' => 'Proyecto',
            'objetivo' => 'Objetivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividades()
    {
        return $this->hasMany(Actividades::className(), ['indicador' => 'id_i']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultado0()
    {
        return $this->hasOne(Resultados::className(), ['id_r' => 'resultado']);
    }

    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }

    public function getObjetivo0()
    {
        return $this->hasOne(Objetivos::className(), ['id_o' => 'objetivo']);
    }
}
