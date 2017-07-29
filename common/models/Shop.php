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
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

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

    public static function stateNames()
    {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_INACTIVE => 'Блок.',
        ];
    }

    public function isActive()
    {
        return ($this->active == self::STATUS_ACTIVE);
    }

    public static function findAnyByFirm($firm_id)
    {
        return self::findOne(['firm_id' => $firm_id])->id;
    }
}
