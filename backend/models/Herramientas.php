<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "herramientas".
 *
 * @property int $id_h
 * @property string $nombre
 * @property int $programa
 *
 * @property Proyectos[] $proyectos
 */
class Herramientas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'herramientas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'programa'], 'required'],
            [['programa'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_h' => 'Id H',
            'nombre' => 'Nombre',
            'programa' => 'Programa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectos()
    {
        return $this->hasMany(Proyectos::className(), ['herramienta' => 'id_h']);
    }

    public function getPrograma0()
    {
        return $this->hasOne(Programas::className(), ['id_pr' => 'programa']);
    }
}
