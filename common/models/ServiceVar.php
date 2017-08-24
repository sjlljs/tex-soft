<?php

namespace common\models;

use Yii;
use \common\models\base\ServiceVar as BaseServiceVar;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service_var".
 */
class ServiceVar extends BaseServiceVar
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
