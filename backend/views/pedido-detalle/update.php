<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoDetalle */

$this->title = 'Actualizar  Detalles de compra: ' . $model->pedido_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles del pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pedido_id, 'url' => ['view', 'pedido_id' => $model->pedido_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pedido-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
