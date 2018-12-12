<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "programas".
 *
 * @property int $id_pr
 * @property string $codigo_pr
 * @property string $nombre
 * @property string $descripcion
 * @property string $objetivo
 */
class Programas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_pr', 'nombre', 'descripcion', 'objetivo'], 'required'],
            [['objetivo'], 'string'],
            [['codigo_pr'], 'string', 'max' => 100],
            [['nombre', 'descripcion'], 'string', 'max' => 200],
            [['codigo_pr'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pr' => 'Id Pr',
            'codigo_pr' => 'Código',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'objetivo' => 'Objetivo',
        ];
    }

    public function getHerramientas()
    {
        return $this->hasMany(Herramientas::className(), ['programa' => 'id_pr']);
    }

    public function getProyectos()
    {
        return $this->hasMany(Proyectos::className(), ['programa' => 'id_pr']);
    }
}
