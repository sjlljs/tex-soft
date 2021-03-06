<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "service_category".
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $firm_id
 * @property integer $shop_id
 * @property string $name
 * @property integer $num
 * @property integer $nalog_type
 * @property string $picture
 * @property integer $deleted
 * @property integer $active
 * @property integer $defect_id
 *
 * @property \common\models\Service[] $services
 * @property \common\models\Defect $defect
 * @property \common\models\Firm $firm
 * @property \common\models\Shop $shop
 * @property string $aliasModel
 */
abstract class ServiceCategory extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_category';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'firm_id', 'shop_id', 'num', 'nalog_type', 'deleted', 'active', 'defect_id'], 'integer'],
            [['picture'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['defect_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Defect::className(), 'targetAttribute' => ['defect_id' => 'id']],
            [['firm_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Firm::className(), 'targetAttribute' => ['firm_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Shop::className(), 'targetAttribute' => ['shop_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'подкатегории',
            'firm_id' => 'id фирмы',
            'shop_id' => 'id точки',
            'name' => 'Название',
            'num' => 'порядок/позиция в списке',
            'nalog_type' => 'Тип надогообложения',
            'picture' => 'Картинка',
            'deleted' => 'удалена',
            'active' => 'Активна',
            'defect_id' => 'описание/дефектовка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(\common\models\Service::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDefect()
    {
        return $this->hasOne(\common\models\Defect::className(), ['id' => 'defect_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(\common\models\Firm::className(), ['id' => 'firm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(\common\models\Shop::className(), ['id' => 'shop_id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\ServiceCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ServiceCategoryQuery(get_called_class());
    }


}
