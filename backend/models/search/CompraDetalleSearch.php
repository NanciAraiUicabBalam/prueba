<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CompraDetalle;

/**
 * CompraDetalleSearch represents the model behind the search form of `backend\models\CompraDetalle`.
 */
class CompraDetalleSearch extends CompraDetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['compra_id', 'factura_id', 'producto_id'], 'integer'],
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
        $query = CompraDetalle::find();

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
            'compra_id' => $this->compra_id,
            'factura_id' => $this->factura_id,
            'producto_id' => $this->producto_id,
            'precio_compra' => $this->precio_compra,
        ]);

        return $dataProvider;
    }
}
