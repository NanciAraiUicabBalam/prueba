<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Compras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'fecha_compra',
            'subtotal',
            'iva',
            //'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
