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
            [['nombre', 'indicador'], 'filter', 'filter' => 'strtoupper'],
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

    public function beforeSave($insert){
        //DE FORMA INDIVIDUAL
        $this->nombre = mb_strtoupper($this->nombre, 'UTF-8');

        $this->indicador = mb_strtoupper($this->indicador, 'UTF-8');
        

        //TODOS LOS ATRIBUTOS    
        //$this->attributes = array_map('strtoupper',$this->attributes);
        
        return parent::beforeSave($insert);

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
