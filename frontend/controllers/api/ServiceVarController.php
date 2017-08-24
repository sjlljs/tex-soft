<?php

namespace frontend\controllers\api;

/**
* This is the class for REST controller "ServiceVarController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ServiceVarController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\ServiceVar';
}
