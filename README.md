# yii2-contact-me

## Установка
Предпочтительно через composer:
```
composer require pantera-digital/yii2-contact-me "@dev"
```
Или добавьте в composer.json
```
"pantera-digital/yii2-contact-me": "@dev"
```

## Backend
```
'modules' => [
    'contact-me' => [
        'class' => \pantera\contactMe\admin\Module::className(),
        'permissions' => ['admin'],
    ],
],
```
Параметр permissions принимает массив ролей которым доступно управление

## Frontend 
```
'modules' => [
    'contact-me' => [
        'class' => \pantera\contactMe\Module::className(),
        'successMessage' => 'Спасибо мы скоро с вами свяжемся!',
    ],
],
```
Параметр successMessage принимает строку которая будет показана пользователю после отправки формы

## Миграции
```
php yii migrate/up --migrationPath=@pantera/contactMe/migrations
```

## Использование виджета
```
<?php

use pantera\contactMe\widgets\contactMe\ContactMeWidget;

<?= ContactMeWidget::widget() ?>
```
или
```
<?= pantera\contactMe\widgets\contactMe\ContactMeWidget::widget() ?>
```

## Настройка
Параметры виджета:
```
/* @var string Экшн в форме */
public $action = '/contact-me/default/index';

/* @var string Лейбл на кнопке вызова модалки и самой отправки */
public $btnLabel = 'Перезвоните мне';

/* @var string Заголовок модального окна */
public $modalTitle = 'Обратный звонок';

/* @var string Краткий текст перед формой */
public $modalPrompt = 'Оставьте Ваши контактные данные и наш менеджер свяжется с Вами!';

/* @var boolean Использовать Ladda */
public $useLadda = true;

/* @var boolean Использовать Growl */
public $useGrowl = true;
```
