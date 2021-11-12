<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "compra_detalle".
 *
 * @property int $compra_id
 * @property int $factura_id
 * @property int $producto_id
 * @property float $precio_compra
 *
 * @property Compras $compra
 * @property Productos $producto
 */
class CompraDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra_detalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compra_id', 'factura_id', 'producto_id', 'precio_compra'], 'required'],
            [['compra_id', 'factura_id', 'producto_id'], 'integer'],
            [['precio_compra'], 'number'],
            [['compra_id', 'producto_id'], 'unique', 'targetAttribute' => ['compra_id', 'producto_id']],
            [['compra_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compras::className(), 'targetAttribute' => ['compra_id' => 'id']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['producto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'compra_id' => 'Compra ID',
            'factura_id' => 'Factura ID',
            'producto_id' => 'Producto ID',
            'precio_compra' => 'Precio Compra',
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
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'producto_id']);
    }
}
