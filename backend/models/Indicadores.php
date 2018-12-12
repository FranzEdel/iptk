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
            [['nombre', 'resultado', 'proyecto'], 'required'],
            [['resultado', 'proyecto'], 'integer'],
            [['codigo_i', 'fuente_verificacion'], 'string'],
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
            'codigo_i' => 'Código',
            'nombre' => 'Nombre',
            'fuente_verificacion',
            'resultado' => 'Resultado',
            'proyecto' => 'Proyecto',
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

}
