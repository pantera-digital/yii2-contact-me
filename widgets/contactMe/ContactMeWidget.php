<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 12/5/17
 * Time: 7:05 PM
 */

namespace pantera\contactMe\widgets\contactMe;

use pantera\contactMe\models\ContactMe;
use yii\base\Widget;
use yii\helpers\Url;

class ContactMeWidget extends Widget
{
    /* @var string Акшион в форме подписки */
    public $action;

    public function run()
    {
        parent::run();
        $model = new ContactMe();
        return $this->render('index', [
            'model' => $model,
            'action' => $this->action,
        ]);
    }

    public function init()
    {
        parent::init();
        if (is_null($this->action)) {
            $this->action = Url::to(['/contact-me/default/index']);
        }
        ContactMeAsset::register($this->view);
    }
}