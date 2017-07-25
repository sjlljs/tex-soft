<?php

namespace common\models;

use Yii;
use \common\models\base\Shop as BaseShop;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "shop".
 */
class Shop extends BaseShop
{

public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
             parent::rules(),
             [
                  # custom validation rules
             ]
        );
    }
}
