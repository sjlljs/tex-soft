<?php

namespace frontend\controllers\api;

/**
 * This is the class for REST controller "ShopController".
 */

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ShopController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Shop';
}
