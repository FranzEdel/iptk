<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "indicadores_r".
 *
 * @property int $id_i
 * @property string $nombre
 * @property int $resultado
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
            [['nombre', 'resultado'], 'required'],
            [['resultado'], 'integer'],
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

    public function getNombreI()
    {
        return $this->nombre;
    }
}
