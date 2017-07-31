<?php

namespace frontend\controllers;

use common\models\Shop;
use yii\helpers\Url;

/**
 * This is the class for controller "ShopController".
 */
class ShopController extends base\ShopController
{
    public function actionChange($id)
    {
        $new_shop = Shop::findOne($id);
        if (!is_null($new_shop))
            \Yii::$app->shop->set($id);
     //   \Yii::$app->response->format = Response::FORMAT_JSON;

        //return $this->redirect(['index']);
        return $this->redirect(Url::previous());
    }
}
