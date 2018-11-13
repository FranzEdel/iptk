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
            [['fecha_fin'],'compararFecha'],
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

    public function beforeSave($insert){
        //DE FORMA INDIVIDUAL
        //$this->algunatributo = strtoupper($this->algunatributo);


        //TODOS LOS ATRIBUTOS    
        $this->attributes = array_map('strtoupper',$this->attributes);
        
        return parent::beforeSave($insert);

    }

    public function compararFecha($attribute, $params)
    {
        $fecha_ini = date($this->fecha_ini);
        $fecha_fin = date($this->fecha_fin);

        if($fecha_ini > $fecha_fin){
            $this->addError($attribute, 'La fecha final no puede ser anterior a la fecha inicial');
        }
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

    public function getResultados()
    {
        return $this->hasMany(Resultados::className(), ['proyecto' => 'id_p']);
    }

    public function getIndicadores()
    {
        return $this->hasMany(Indicadores::className(), ['proyecto' => 'id_p']);
    }

    public function getActividades()
    {
        return $this->hasMany(Actividades::className(), ['proyecto' => 'id_p']);
    }
}
