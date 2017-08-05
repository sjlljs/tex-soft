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
 * @property integer $del
 * @property integer $active
 *
 * @property \common\models\Shop $shop
 * @property \common\models\Firm $firm
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
            [['pid', 'firm_id', 'shop_id', 'num', 'nalog_type', 'del', 'active'], 'integer'],
            [['picture'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['firm_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Firm::className(), 'targetAttribute' => ['firm_id' => 'id']]
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
            'name' => 'название',
            'num' => 'порядок/позиция в списке',
            'nalog_type' => 'тип надогообложения',
            'picture' => 'картинка',
            'del' => 'удалена',
            'active' => 'активна/неактивна',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(\common\models\Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirm()
    {
        return $this->hasOne(\common\models\Firm::className(), ['id' => 'firm_id']);
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