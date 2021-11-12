<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompraDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'compra_id')->textInput() ?>

    <?= $form->field($model, 'factura_id')->textInput() ?>

    <?= $form->field($model, 'producto_id')->textInput() ?>

    <?= $form->field($model, 'precio_compra')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
