<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perfiL".
 *
 * @property int $id
 * @property int $user_id
 * @property int $role_id
 * @property string $nombres
 * @property string $apellidos
 * @property string $direccion
 * @property string $telefono
 */
class PerfiL extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfiL';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'role_id', 'nombres', 'apellidos', 'direccion', 'telefono'], 'required'],
            [['id', 'user_id', 'role_id'], 'integer'],
            [['nombres', 'apellidos'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 10],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'role_id' => 'Role ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }
}
