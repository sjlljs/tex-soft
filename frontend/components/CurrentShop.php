<?php

namespace frontend\components;

use yii\base\Component;
use Yii;

class CurrentShop extends Component
{
    private $attribute='shop_id';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        //Yii::$app->session->get($this->attribute, 0);
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
        //Yii::$app->session->set($this->attribute, $id);

    }
}