<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proyectos".
 *
 * @property int $id_p
 * @property string $nombre_p
 * @property string $objetivo_general
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property string $estado
 *
 * @property Eventos[] $eventos
 * @property Objetivos[] $objetivos
 */
class Proyectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_p', 'objetivo_general', 'fecha_ini', 'fecha_fin', 'estado'], 'required'],
            [['objetivo_general', 'estado'], 'string'],
            [['fecha_ini', 'fecha_fin'], 'safe'],
            [['nombre_p'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_p' => 'Id P',
            'nombre_p' => 'Nombre del Proyecto',
            'objetivo_general' => 'Objetivo General',
            'fecha_ini' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Eventos::className(), ['proyecto' => 'id_p']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetivos()
    {
        return $this->hasMany(Objetivos::className(), ['proyecto' => 'id_p']);
    }
}
