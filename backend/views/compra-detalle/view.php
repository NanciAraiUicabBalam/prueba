<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CompraDetalle */

$this->title = $model->factura_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles de compra', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compra-detalle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id], [
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
            'compra_id',
            'factura_id',
            'producto_id',
            'precio_compra',
        ],
    ]) ?>

</div>
