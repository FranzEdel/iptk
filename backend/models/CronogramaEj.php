<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cronograma_e".
 *
 * @property int $id_ce
 * @property string $item
 * @property string $ene
 * @property string $feb
 * @property string $mar
 * @property string $abr
 * @property string $may
 * @property string $jun
 * @property string $jul
 * @property string $ago
 * @property string $sep
 * @property string $oct
 * @property string $nov
 * @property string $dic
 * @property string $total
 * @property int $recursos_h
 * @property int $actividad
 * @property int $objetivo
 * @property int $proyecto
 *
 * @property Actividades $actividad0
 * @property RecursosHumanos $recursosH
 * @property Objetivos $objetivo0
 * @property Proyectos $proyecto0
 */
class CronogramaEj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cronograma_e';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic', 'total'], 'number'],
            [['recursos_h', 'actividad', 'objetivo', 'proyecto'], 'required'],
            [['recursos_h', 'actividad', 'objetivo', 'proyecto'], 'integer'],
            [['item'], 'string', 'max' => 200],
            [['actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['actividad' => 'id_a']],
            [['recursos_h'], 'exist', 'skipOnError' => true, 'targetClass' => RecursosHumanos::className(), 'targetAttribute' => ['recursos_h' => 'id_rh']],
            [['objetivo'], 'exist', 'skipOnError' => true, 'targetClass' => Objetivos::className(), 'targetAttribute' => ['objetivo' => 'id_o']],
            [['proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['proyecto' => 'id_p']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ce' => 'Id Ce',
            'item' => 'Item',
            'ene' => 'Ene',
            'feb' => 'Feb',
            'mar' => 'Mar',
            'abr' => 'Abr',
            'may' => 'May',
            'jun' => 'Jun',
            'jul' => 'Jul',
            'ago' => 'Ago',
            'sep' => 'Sep',
            'oct' => 'Oct',
            'nov' => 'Nov',
            'dic' => 'Dic',
            'total' => 'Total',
            'recursos_h' => 'Recursos H',
            'actividad' => 'Actividad',
            'objetivo' => 'Objetivo',
            'proyecto' => 'Proyecto',
        ];
    }

    public function getTotalPro($id_p){
        $query = (new \yii\db\Query())->from('cronograma_e')->where(['proyecto' => $id_p]);
        $sum = $query->sum('total');
        return number_format($sum, 2) . ' Bs';
    }

    public function getTotalObj($id_o){
        $query = (new \yii\db\Query())->from('cronograma_e')->where(['objetivo' => $id_o]);
        $sum = $query->sum('total');
        return number_format($sum, 2) . ' Bs';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetivo0()
    {
        return $this->hasOne(Objetivos::className(), ['id_o' => 'objetivo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }
}
