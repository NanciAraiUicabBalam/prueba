<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = 'Añadir Productos';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
