<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unidades".
 *
 * @property int $id
 * @property string $descrpcion
 *
 * @property Productos[] $productos
 */
class Unidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descrpcion'], 'required'],
            [['descrpcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descrpcion' => 'Descrpcion',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Productos::className(), ['unidad_id' => 'id']);
    }
}
