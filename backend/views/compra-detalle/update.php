<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CompraDetalle */

$this->title = 'Actualizar los detalles de la compra: ' . $model->factura_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles de compra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->factura_id, 'url' => ['view', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="compra-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
