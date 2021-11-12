<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompraDetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-detalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'compra_id') ?>

    <?= $form->field($model, 'factura_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'precio_compra') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
