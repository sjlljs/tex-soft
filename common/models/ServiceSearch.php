<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Service;

/**
* ServiceSearch represents the model behind the search form about `common\models\Service`.
*/
class ServiceSearch extends Service
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'category_id', 'base_cost', 'time', 'ticket', 'num', 'fixed', 'margin', 'discount', 'payment', 'deleted'], 'integer'],
            [['name', 'barcode', 'unit', 'hint', 'comment'], 'safe'],
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
$query = Service::find();

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
            'category_id' => $this->category_id,
            'base_cost' => $this->base_cost,
            'time' => $this->time,
            'ticket' => $this->ticket,
            'num' => $this->num,
            'fixed' => $this->fixed,
            'margin' => $this->margin,
            'discount' => $this->discount,
            'payment' => $this->payment,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'barcode', $this->barcode])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'hint', $this->hint])
            ->andFilterWhere(['like', 'comment', $this->comment]);

return $dataProvider;
}
}