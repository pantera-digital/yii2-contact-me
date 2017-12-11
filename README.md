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
у виджета есть только один параметр
```
action
```
отвечает за action формы

дефолтное значение
```
Url::to(['/contact-me/default/index'])
```
