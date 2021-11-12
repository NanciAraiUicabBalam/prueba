<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PedidoDetalle;

/**
 * PedidoDetalleSearch represents the model behind the search form of `backend\models\PedidoDetalle`.
 */
class PedidoDetalleSearch extends PedidoDetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedido_id', 'empresa_id', 'compra_id', '`precio venta'], 'integer'],
            [['precio_compra'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PedidoDetalle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pedido_id' => $this->pedido_id,
            'empresa_id' => $this->empresa_id,
            'compra_id' => $this->compra_id,
            'precio_compra' => $this->precio_compra,
            '`precio venta' => $this->`precio venta,
        ]);

        return $dataProvider;
    }
}
