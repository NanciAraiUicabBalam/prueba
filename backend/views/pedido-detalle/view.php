<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoDetalle */

$this->title = $model->pedido_id;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-detalle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pedido_id' => $model->pedido_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pedido_id' => $model->pedido_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pedido_id',
            'empresa_id',
            'compra_id',
            'precio_compra',
            'precio venta',
        ],
    ]) ?>

</div>
