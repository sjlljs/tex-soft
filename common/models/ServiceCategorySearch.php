<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ServiceCategory;

/**
 * ServiceCategorySearch represents the model behind the search form about `common\models\ServiceCategory`.
 */
class ServiceCategorySearch extends ServiceCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'firm_id', 'shop_id', 'num', 'nalog_type', 'del', 'active'], 'integer'],
            [['name', 'picture'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
// bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ServiceCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pid' => $this->pid,
            'firm_id' => $this->firm_id,
            'shop_id' => $this->shop_id,
            'num' => $this->num,
            'nalog_type' => $this->nalog_type,
            'del' => $this->del,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'picture', $this->picture]);

        return $dataProvider;
    }
}