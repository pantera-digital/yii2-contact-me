<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 12/5/17
 * Time: 7:05 PM
 */

use pantera\contactMe\models\ContactMe;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this View */
/* @var $model ContactMe */
/* @var $action string */
?>

<?php Modal::begin([
    'options' => [
        'id' => 'modal-contact-me',
    ],
    'header' => '<div class="h4 modal-title">' . $this->context->modalTitle . '</div>',
    'toggleButton' => [
        'tag' => 'a',
        'label' => $this->context->btnLabel,
        'class' => [
            'btn btn-default'
        ],
    ],
]); ?>

<?php if ($this->context->modalPrompt) echo Html::tag('p', $this->context->modalPrompt, [
    'class' => 'modal-contact-me-prompt',
])?>

<?php $form = ActiveForm::begin([
    'id' => 'contact-me-form',
    'action' => Url::to([$this->context->action]),
    'enableClientScript' => false,
    'options' => [
        'class' => 'form-callback',
    ],
]) ?>

<?= $form->field($model, 'name')->textInput([
    'placeholder' => 'Иван Иванов',
    'required' => true,
]) ?>

<?= $form->field($model, 'phone')->textInput([
    'placeholder' => '+7 (ХХХ) ХХХ-ХХ-ХХ',
    'required' => true,
]) ?>

<?= $form->field($model, 'email')->input('email', [
    'placeholder' => 'example@example.ru',
    'required' => true,
]) ?>

<?= Html::submitButton(Html::tag('span', $this->context->btnLabel, [
    'class' => ($this->context->useLadda ? 'ladda-label' : null),
]), [
    'class' => 'btn btn-primary btn-block' . ($this->context->useLadda ? ' ladda-button' : ''),
    'data-style' => ($this->context->useLadda ? 'zoom-in' : null),
]) ?>

<?php ActiveForm::end() ?>

<?php Modal::end(); ?>