<?php

namespace frontend\controllers\api;

/**
* This is the class for REST controller "DefectController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class DefectController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Defect';
}
