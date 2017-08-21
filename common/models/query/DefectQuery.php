<?php

namespace common\models\query;

use common\models\Defect;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\Defect]].
 *
 * @see \common\models\Defect
 */
class DefectQuery extends ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Defect[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Defect|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function isMainGroup()
    {
        $this->andWhere(['pid' => Defect::MAIN_GROUP]);
        return $this;
    }

    public function byFirm($firm_id)
    {
        $this->andWhere(['firm_id' => $firm_id]);
        return $this;
    }

    public function currentFirm()
    {
        $this->byFirm(\Yii::$app->user->identity->firm_id);
        return $this;
    }

    public function isDeleted()
    {
        $this->andWhere(['deleted' => Defect::IS_DELETED]);
        return $this;
    }

    public function isNotDeleted()
    {
        $this->andWhere(['deleted' => Defect::IS_NOT_DELETED]);
        return $this;
    }
}
