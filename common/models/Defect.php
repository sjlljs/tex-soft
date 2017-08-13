<?php

namespace common\models;

use Yii;
use \common\models\base\Defect as BaseDefect;
use yii\helpers\ArrayHelper;

/**
 * @property \common\models\Defect[] $subgroups
 */

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

    /**
     * @return \common\models\Defect[]
     */
    public function getSubgroups()
    {
        return Defect::hasMany(Defect::className(), ['pid' => 'id']);
    }
}
