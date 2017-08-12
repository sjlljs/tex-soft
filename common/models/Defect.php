<?php

namespace common\models;

use Yii;
use \common\models\base\Defect as BaseDefect;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "defect".
 */
class Defect extends BaseDefect
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
