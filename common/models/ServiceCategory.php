<?php

namespace common\models;

use Yii;
use \common\models\base\ServiceCategory as BaseServiceCategory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service_category".
 */
class ServiceCategory extends BaseServiceCategory
{
    const NALOG_USN = 1;
    const NALOG_PATENT = 2;

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

    public static function NalogNames()
    {
        return [
            self::NALOG_USN => 'доходы УСН',
            self::NALOG_PATENT => 'доходы патент'
        ];
    }

    public function setActive()
    {
        $this->active = self::STATUS_ACTIVE;
    }
}
