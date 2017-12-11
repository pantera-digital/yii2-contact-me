<?php

use pantera\contactMe\models\ContactMe;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ContactMe */

$this->title = 'Обновить';
$this->params['breadcrumbs'][] = ['label' => 'Запросы на обратный звонок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-me-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
