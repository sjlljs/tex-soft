<?php

namespace common\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Firm]].
 *
 * @see \common\models\Firm
 */
class FirmQuery extends ActiveQuery
{
    public function active()
    {
        $this->andWhere('deleted=0');
        return $this;
    }

    public function allActive()
    {
        return $this->active()->all();
    }

    /**
     * @inheritdoc
     * @return \common\models\Firm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Firm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
