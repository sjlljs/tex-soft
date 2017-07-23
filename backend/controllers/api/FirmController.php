<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "FirmController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class FirmController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Firm';
}
