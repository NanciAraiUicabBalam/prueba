<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property int $user_id
 * @property string $fecha_pedido
 * @property string $fecha_entrega
 * @property float $subtotal
 * @property int $iva
 * @property float $total
 *
 * @property PedidoDetalle[] $pedidoDetalles
 * @property User $user
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fecha_pedido', 'fecha_entrega', 'subtotal', 'iva', 'total'], 'required'],
            [['user_id', 'iva'], 'integer'],
            [['fecha_pedido', 'fecha_entrega'], 'safe'],
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
            'fecha_pedido' => 'Fecha Pedido',
            'fecha_entrega' => 'Fecha Entrega',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'total' => 'Total',
        ];
    }

    /**
     * Gets query for [[PedidoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::className(), ['pedido_id' => 'id']);
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
