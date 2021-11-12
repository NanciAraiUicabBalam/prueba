<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perfil */

$this->title = 'Actualizar ' . $model->nombres;
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombres, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
