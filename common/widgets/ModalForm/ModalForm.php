<?php
namespace common\widgets\ModalForm;

use yii\bootstrap\Widget;

class ModalForm extends Widget
{

    public function run()
    {
        ModalAsset::register($this->getView());
        return $this->render('_modal');
    }

} 