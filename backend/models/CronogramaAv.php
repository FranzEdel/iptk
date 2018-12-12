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
 * @property int $programados
 * @property string $total
 * @property string $avance
 * @property int $actividad
 * @property int $resultado
 * @property int $proyecto
 *
 * @property Actividades $actividad0
 * @property RecursosHumanos $recursosH
 * @property Resultados $resultado0
 * @property Proyectos $proyecto0
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
            [['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic', 'programados', 'actividad', 'resultado', 'proyecto', 'gestion'], 'integer'],
            [['total', 'avance'], 'number'],
            [['actividad', 'resultado', 'proyecto'], 'required'],
            [['actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividades::className(), 'targetAttribute' => ['actividad' => 'id_a']],
            [['proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['proyecto' => 'id_p']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ca' => 'Id Ca',
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
            'programados' => 'Programados',
            'total' => 'Total',
            'avance' => 'Avance',
            'gestion' => 'Gestion',
            'actividad' => 'Nombre Actividad',
            'resultado' => 'Resultado',
            'proyecto' => 'Proyecto',
        ];
    }

    public function getTotalAvanceGeneral($id_p){
        $query = (new \yii\db\Query())->from('cronograma_a')->where(['proyecto' => $id_p]);
        $ava = $query->average('avance');
        return number_format($ava, 2);
    }

    public function getPorGeneral($id_p){
        $query = (new \yii\db\Query())->from('cronograma_a')->where(['proyecto' => $id_p]);
        $ava = $query->average('avance');
        return number_format($ava, 2) . ' %';
    }

    public function getTotalAvanceResultado($id_r){
        $query = (new \yii\db\Query())->from('cronograma_a')->where(['resultado' => $id_r]);
        $ava = $query->average('avance');
        return number_format($ava, 2);
    }

    public function getPorResultado($id_r){
        $query = (new \yii\db\Query())->from('cronograma_a')->where(['resultado' => $id_r]);
        $ava = $query->average('avance');
        return number_format($ava, 2) . ' %';
    }

    public function getTotal(){
        $query = (new \yii\db\Query())->from('cronograma_a');
        $ava = $query->average('avance');
        return number_format($ava, 2);
    }

    public function getPor(){
        $query = (new \yii\db\Query())->from('cronograma_a');
        $ava = $query->average('avance');
        return number_format($ava, 2) . ' %';
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
    public function getResultado0()
    {
        return $this->hasOne(Resultados::className(), ['id_r' => 'resultado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto0()
    {
        return $this->hasOne(Proyectos::className(), ['id_p' => 'proyecto']);
    }
}
