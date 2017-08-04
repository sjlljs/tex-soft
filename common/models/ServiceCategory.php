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
