<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pedido_detalle".
 *
 * @property int $pedido_id
 * @property int $empresa_id
 * @property int $compra_id
 * @property float $precio_compra
 * @property int $precio_venta
 *
 * @property Compras $compra
 * @property Empresa $empresa
 * @property Pedido $pedido
 */
class PedidoDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido_detalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedido_id', 'empresa_id', 'compra_id', 'precio_compra', 'precio_venta'], 'required'],
            [['pedido_id', 'empresa_id', 'compra_id', 'precio_venta'], 'integer'],
            [['precio_compra'], 'number'],
            [['pedido_id'], 'unique'],
            [['compra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compras::className(), 'targetAttribute' => ['compra_id' => 'id']],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['empresa_id' => 'id']],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['pedido_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pedido_id' => 'Pedido ID',
            'empresa_id' => 'Empresa ID',
            'compra_id' => 'Compra ID',
            'precio_compra' => 'Precio Compra',
            'precio_venta' => 'Precio Venta',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compras::className(), ['id' => 'compra_id']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[Pedido]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedido_id']);
    }
}
