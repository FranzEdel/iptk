<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cronograma_a".
 *
 * @property int $id_ca
 * @property int $ene
 * @property int $feb
 * @property int $mar
 * @property int $abr
 * @property int $may
 * @property int $jun
 * @property int $jul
 * @property int $ago
 * @property int $sep
 * @property int $oct
 * @property int $nov
 * @property int $dic
 * @property int $total
 * @property int $recursos_h
 * @property int $actividad
 *
 * @property Actividades $actividad0
 * @property RecursosHumanos $recursosH
 */
class CronogramaAv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cronograma_a';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic', 'total', 'recursos_h', 'actividad'], 'integer'],
            [['recursos_h', 'actividad'], 'required'],
            [['actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['actividad' => 'id_a']],
            [['recursos_h'], 'exist', 'skipOnError' => true, 'targetClass' => RecursosHumanos::className(), 'targetAttribute' => ['recursos_h' => 'id_rh']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ca' => 'Id Ca',
            'ene' => 'Enero',
            'feb' => 'Febrero',
            'mar' => 'Marzo',
            'abr' => 'Abril',
            'may' => 'Mayo',
            'jun' => 'Junio',
            'jul' => 'Julio',
            'ago' => 'Agosto',
            'sep' => 'Septiembre',
            'oct' => 'Octubre',
            'nov' => 'Noviembre',
            'dic' => 'Diciembre',
            'total' => 'Total',
            'recursos_h' => 'Recursos H',
            'actividad' => 'Actividad',
        ];
    }

    public function getAvance()
    {
        $cont = 0;
        
        if($this->ene > 0){
            $cont = $cont + 1;
        }

        return $cont;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad0()
    {
        return $this->hasOne(Actividades::className(), ['id_a' => 'actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecursosH()
    {
        return $this->hasOne(RecursosHumanos::className(), ['id_rh' => 'recursos_h']);
    }
}
