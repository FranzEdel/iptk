<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $id_user
 * @property string $nombre
 * @property string $apellido
 * @property string $estado
 * @property int $rol
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nombre', 'apellido', 'estado', 'rol'], 'required'],
            [['id_user'], 'integer'],
            [['estado', 'rol'], 'string'],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['id_user'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'estado' => 'Estado',
            'rol' => 'Rol',
        ];
    }

    public function getFullName()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
