<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "compras".
 *
 * @property int $id
 * @property int $user_id
 * @property string $fecha_compra
 * @property float $subtotal
 * @property int $iva
 * @property float $total
 *
 * @property CompraDetalle[] $compraDetalles
 * @property PedidoDetalle[] $pedidoDetalles
 * @property User $user
 */
class Compras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fecha_compra', 'subtotal', 'iva', 'total'], 'required'],
            [['user_id', 'iva'], 'integer'],
            [['fecha_compra'], 'safe'],
            [['subtotal', 'total'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'fecha_compra' => 'Fecha Compra',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'total' => 'Total',
        ];
    }

    /**
     * Gets query for [[CompraDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompraDetalles()
    {
        return $this->hasMany(CompraDetalle::className(), ['compra_id' => 'id']);
    }

    /**
     * Gets query for [[PedidoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::className(), ['compra_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
