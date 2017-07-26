<?php

namespace common\models;

use Yii;
use \common\models\base\Firm as BaseFirm;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "firm".
 *
 * @property string $color
 * @property integer $active
 */
class Firm extends BaseFirm
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;

    static $stateColor = [
        self::STATUS_ACTIVE => 'green',
        self::STATUS_INACTIVE => 'red',
    ];

    static $stateNames=[
        self::STATUS_ACTIVE=>'Активен',
        self::STATUS_INACTIVE=>'Неактивен',
    ];


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

    public function getColor()
    {
        return self::$stateColor[$this->deleted];
    }

    public function getActive()
    {
        return !($this->deleted);
    }
}
