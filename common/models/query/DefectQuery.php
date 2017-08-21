<?php

namespace common\models\query;
use common\models\Defect;

/**
 * This is the ActiveQuery class for [[\common\models\Defect]].
 *
 * @see \common\models\Defect
 */
class DefectQuery extends \yii\db\ActiveQuery
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

}
