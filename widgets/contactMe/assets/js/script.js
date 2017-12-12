$(window).on('load', function () {
    //Обработка отправки заявки на обратный звонок
    $('#call-me-form').submit(function () {
        var self = $(this);
        //Показываем спинер на кнопке
        var btn = self.find('button[type="submit"]');
        btn.ladda();
        btn.ladda('start');
        $.ajax({
            method: 'POST',
            url: self.attr('action'),
            data: self.serialize()
        }).always(function (result) {
            //Сообщения об ошибке или успехе показываем growl
            $.growl.error({
                title: '',
                message: result.message,
                style: result.style
            });
            //Убераем спинер с кнопки
            btn.ladda('stop');
            //Если всё успешно закрываем модалку
            if (result.status === 'success') {
                $('#modal-callback').modal('hide');
            }
        });
        return false;
    });

    //Очистка всех полей после закрытия модалки
    $('#modal-callback').on('hidden.bs.modal', function (e) {
        $(this).find('input, textarea').val('');
    });
});