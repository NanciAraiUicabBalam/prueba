<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompraDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalles de compra';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-detalle-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Añadir detalles de compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'compra_id',
            'factura_id',
            'producto_id',
            'precio_compra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
