<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "recursos_humanos".
 *
 * @property int $id_rh
 * @property string $nombres
 * @property string $apellidos
 *
 * @property CronogramaA[] $cronogramaAs
 * @property CronogramaE[] $cronogramaEs
 */
class RecursosHumanos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recursos_humanos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombres', 'apellidos'], 'required'],
            [['nombres', 'apellidos'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rh' => 'Id Rh',
            'nombres' => 'Nombre',
            'apellidos' => 'Apellido',
        ];
    }

    public function getFullName()
    {
        return $this->nombres .' '. $this->apellidos;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCronogramaAs()
    {
        return $this->hasMany(CronogramaA::className(), ['recursos_h' => 'id_rh']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCronogramaEs()
    {
        return $this->hasMany(CronogramaE::className(), ['recursos_h' => 'id_rh']);
    }

    public function getActividad()
    {
        return $this->hasMany(Actividvades::className(), ['rrhh' => 'id_rh']);
    }
}
