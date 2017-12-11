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

/* @var $this View */
/* @var $model ContactMe */
/* @var $action string */
?>
<a class="btn btn-green btn-md" data-toggle="modal" data-target="#modal-callback">
    Перезвоните мне
</a>

<div class="modal modal-sm" id="modal-callback">
    <div class="modal-dialog">
        <button class="close" data-dismiss="modal">
            <span class="icon svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150.1 149.7" width="16" height="16">
                    <path d="M82.1,66.6C60.3,45.3,38.4,24,16.6,2.7C7.6-6-5.8,8.2,3.2,17c19.4,18.9,38.9,37.9,58.3,56.8
                        C42,93.4,22.5,113,2.9,132.6c-8.9,8.9,4.5,23.2,13.4,14.3c21.9-22,43.9-44,65.8-66C85.8,77.2,85.9,70.2,82.1,66.6z"/>
                    <path d="M68,66.6C89.8,45.3,111.7,24,133.5,2.7c9-8.8,22.4,5.5,13.4,14.3C127.5,35.9,108,54.9,88.6,73.8
                    c19.5,19.6,39.1,39.2,58.6,58.8c8.9,8.9-4.5,23.2-13.4,14.3c-21.9-22-43.9-44-65.8-66C64.3,77.2,64.3,70.2,68,66.6z"/>
                </svg>
            </span>
        </button>
        <div class="modal-body">
            <div class="header h3">Обратный звонок</div>
            <div class="modal-second-line">Оставьте Ваши контактные данные, и наш менеджер свяжется с Вами!</div>
            <?php $form = ActiveForm::begin([
                'id' => 'call-me-form',
                'action' => $action,
                'enableClientScript' => false,
                'options' => [
                    'class' => 'form-callback',
                ],
            ]) ?>

            <?= $form->field($model, 'name')->textInput([
                'placeholder' => 'Роман',
            ]) ?>

            <?= $form->field($model, 'phone')->textInput([
                'placeholder' => '+7 (ХХХ) ХХХ-ХХ-ХХ',
            ]) ?>

            <?= $form->field($model, 'email')->textInput([
                'placeholder' => 'example@example.ru',
            ]) ?>

            <div class="form-group form-group-actions">
                <?= Html::submitButton(Html::tag('span', 'Перезвоните мне', [
                    'class' => 'ladda-label',
                ]), [
                    'class' => 'btn btn-green btn-block ladda-button',
                    'data-style' => 'zoom-in',
                ]) ?>
            </div>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>