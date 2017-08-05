<?php

namespace frontend\controllers\api;

/**
 * This is the class for REST controller "ServiceCategoryController".
 */

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ServiceCategoryController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\ServiceCategory';
}
