<?php

namespace backend\models;

use Yii;
use backend\models\Actividades;

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
 * @property int $actividad
 * @property int $resultado
 * @property int $proyecto
 *
 * @property Actividades $actividad0
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
    {   $val = $this->maxVal;
        //$val = 20000;
        return [
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic', 'total'], 'number', 'message' => 'Tiene que ser un valor numerico'],
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'], 'number', 'min' => '0', 'max' => $val],
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'], 'default', 'value' => '0'],
            [['actividad', 'resultado', 'proyecto'], 'required'],
            [['actividad', 'resultado', 'proyecto'], 'integer'],
            [['item'], 'string'],
            [['presupuestado'], 'safe'],
            [['actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['actividad' => 'id_a']],
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
            'actividad' => 'Actividad',
            'resultado' => 'Resultado',
            'proyecto' => 'Proyecto',
            'presupuestado' => 'presupuestado',
        ];
    }

    public function getMaxVal(){
        $presu = round(($this->actividad0['presupuestado'] * 6.97), 2);
        return $presu;
    }

    public function getTotalPro($id_p){
        $query = (new \yii\db\Query())->from('cronograma_e')->where(['proyecto' => $id_p]);
        $sum = $query->sum('total');
        return number_format($sum, 2) . ' Bs';
    }

    public function getTotalRe($id_r){
        $query = (new \yii\db\Query())->from('cronograma_e')->where(['resultado' => $id_r]);
        $sum = $query->sum('total');
        return number_format($sum, 2) . ' Bs';
    }

    public function getTotal(){
        $query = (new \yii\db\Query())->from('cronograma_e');
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

    public function getResultado0()
    {
        return $this->hasOne(Resultados::className(), ['id_r' => 'resultado']);
    }

    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }
}
