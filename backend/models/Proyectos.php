<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "proyectos".
 *
 * @property int $id_p
 * @property string $codigo_p
 * @property string $nombre_p
 * @property string $objetivo_general
 * @property string $agencias
 * @property string $municipios
 * @property string $periodo
 * @property string $fecha_ini
 * @property string $fecha_fin
 * @property string $presupuesto
 * @property string $estado
 * @property string $responsable
 * @property int $num_trabajadores
 * @property string $documento
 * @property int $herramienta
 * @property int $programa

 *
 * @property CronogramaA[] $cronogramaAs
 * @property Eventos[] $eventos
 * @property Objetivos[] $objetivos
 * @property Herramientas $herramienta0
 * @property Programas $programa0
 */
class Proyectos extends \yii\db\ActiveRecord
{
    public $proyecto_doc;
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
            [['codigo_p', 'nombre_p', 'objetivo_general', 'agencias', 'municipios', 'periodo', 'fecha_ini', 'fecha_fin', 'estado', 'responsable', 'num_trabajadores', 'herramienta', 'programa'], 'required'],
            [['nombre_p', 'objetivo_general', 'estado'], 'string'],
            [['fecha_ini', 'fecha_fin'], 'safe'],
            [['presupuesto'],'number'],
            [['num_trabajadores', 'herramienta', 'programa'], 'integer'],
            [['codigo_p', 'municipios', 'periodo', 'responsable'], 'string', 'max' => 100],
            [['agencias'], 'string', 'max' => 200],
            [['herramienta'], 'exist', 'skipOnError' => true, 'targetClass' => Herramientas::className(), 'targetAttribute' => ['herramienta' => 'id_h']],
            [['proyecto_doc'], 'file', 'skipOnEmpty' => true, 'on' => 'update', 'extensions' => 'xls, xlsx, doc, docx, pdf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_p' => 'Id P',
            'codigo_p' => 'Codigo',
            'nombre_p' => 'Nombre Proyecto',
            'objetivo_general' => 'Objetivo General',
            'agencias' => 'Agencias',
            'municipios' => 'Municipios',
            'periodo' => 'Periodo',
            'fecha_ini' => 'Fecha Ini',
            'fecha_fin' => 'Fecha Fin',
            'presupuesto' => 'Presupuesto',
            'estado' => 'Estado',
            'responsable' => 'Responsable',
            'num_trabajadores' => 'Num. Trab.',
            'documento' => 'Documento',
            'proyecto_doc' => 'Documento',
            'herramienta' => 'Herramienta',
            'programa' => 'Programa',
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
    public function getCronogramaAs()
    {
        return $this->hasMany(CronogramaAv::className(), ['proyecto' => 'id_p']);
    }

    public function getCronogramaEs()
    {
        return $this->hasMany(CronogramaEj::className(), ['proyecto' => 'id_p']);
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
    public function getPrograma0()
    {
        return $this->hasOne(Programas::className(), ['id_pr' => 'programa']);
    }

    public function getHerramienta0()
    {
        return $this->hasOne(Herramientas::className(), ['id_h' => 'herramienta']);
    }

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
