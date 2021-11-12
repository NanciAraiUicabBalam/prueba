<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PedidoDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pedido Detalle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pedido_id',
            'empresa_id',
            'compra_id',
            'precio_compra',
            'precio_venta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
