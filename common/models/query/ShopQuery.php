<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Shop]].
 *
 * @see \common\models\Shop
 */
class ShopQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Shop[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Shop|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
