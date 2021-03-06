<?php

namespace common\models;

use Yii;
use \common\models\base\Service as BaseService;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service".
 *
 * @property \common\models\ServiceVar[] $vars
 */
class Service extends BaseService
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

    /**
     * @return \common\models\ServiceVar[]
     */
    public function getVars()
    {
        return Service::hasMany(ServiceVar::className(), ['service_id' => 'id']);
    }
}
