<?php
namespace common\widgets\ModalAjaxForm;

use yii\bootstrap\Modal;
use yii\web\JsExpression;

class ModalAjaxForm extends Modal
{

    public static function widget($config = [])
    {
        $config_new = $config + ['clientEvents' => [
                'hidden.bs.modal' => new JsExpression(
                    "function (){ $(this).removeData('bs.modal'); $(this).find('.modal-content').empty(); }"
                ),
            ]
            ];
        return parent::widget($config_new);
    }
}