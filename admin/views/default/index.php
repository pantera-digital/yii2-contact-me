<?php

use pantera\contactMe\admin\models\ContactMeSearch;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel ContactMeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Запросы на обратный звонок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-me-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?> <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'phone',
            'email:email',
            'referrer',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
