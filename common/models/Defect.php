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
    const MAIN_GROUP=0;

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

    /**
     * @return \common\models\Defect[]
     */
    public static function getAllMainGroups()
    {
        return Defect::find()->isMainGroup()->all();
    }
}
