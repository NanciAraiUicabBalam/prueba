<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoDetalle */

$this->title = 'Update Pedido Detalle: ' . $model->pedido_id;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pedido_id, 'url' => ['view', 'pedido_id' => $model->pedido_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
