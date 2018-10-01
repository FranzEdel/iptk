<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "objetivos".
 *
 * @property int $id_o
 * @property string $nombre
 * @property string $indicador
 * @property int $proyecto
 *
 * @property Proyectos $proyecto0
 * @property Resultados[] $resultados
 */
class Objetivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objetivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'proyecto'], 'required'],
            [['nombre', 'indicador'], 'string'],
            [['proyecto'], 'integer'],
            [['proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['proyecto' => 'id_p']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_o' => 'Id O',
            'nombre' => 'Nombre',
            'indicador' => 'Indicador',
            'proyecto' => 'Proyecto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResultados()
    {
        return $this->hasMany(Resultados::className(), ['objetivo_e' => 'id_o']);
    }

}
