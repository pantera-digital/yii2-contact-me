<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 12/5/17
 * Time: 7:05 PM
 */

namespace pantera\contactMe\widgets\contactMe;

use pantera\contactMe\models\ContactMe;
use pantera\contactMe\widgets\contactMe\GrowlAsset;
use pantera\contactMe\widgets\contactMe\LaddaAsset;
use yii\base\Widget;
use yii\web\View;

class ContactMeWidget extends Widget
{
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

    public function init()
    {
        parent::init();
        $this->registerAssets();
    }

    public function run()
    {
        parent::run();
        return $this->render('index', [
            'model' => new ContactMe(),
        ]);
    }

    private function registerAssets()
    {
        if ($this->useLadda) {
            LaddaAsset::register($this->view);
        }
        if ($this->useGrowl) {
            GrowlAsset::register($this->view);
        }

        $beforeSubmit = '';
        $afterSubmit = '';

        //Показываем спинер на кнопке
        if ($this->useLadda)
        $beforeSubmit .='var btn = self.find("button[type=\'submit\']");'
                . 'btn.ladda();'
                . 'btn.ladda("start");';

        //Убираем спинер с кнопки
        if ($this->useLadda)
        $afterSubmit .= 'btn.ladda("stop");';

        //Сообщения об ошибке или успехе показываем growl
        if ($this->useGrowl)
        $afterSubmit .='$.growl.error({'
                . '    title: "",'
                . '    message: result.message,'
                . '    style: result.style'
                . '});';
        else
        $afterSubmit .='alert(result.message);';

        //Обработка отправки заявки на обратный звонок
        $script =  '$("#contact-me-form").submit(function () {
                        var self = $(this);
                        ' . $beforeSubmit . '
                        $.ajax({
                           method: "POST",
                           url: self.attr("action"),
                           data: self.serialize()
                        }).always(function (result) {
                            ' . $afterSubmit . '
                            //Если всё успешно закрываем модалку
                            if (result.status === "success") {
                                $("#modal-contact-me").modal("hide");
                            }
                        });
                        return false;
                    });';

        $this->view->registerJs(
            $script,
            View::POS_READY,
            'contact-me-handler'
        );

        //Очистка всех полей после закрытия модалки
        $this->view->registerJs(
            '$("#modal-contact-me").on("shown.bs.modal", function (e) {$(this).find(".form-control:eq(0)").focus();});
            $("#modal-contact-me").on("hidden.bs.modal", function (e) {$(this).find("input, textarea").val("");});',
            View::POS_READY,
            'contact-me-clear'
        );
    }
}