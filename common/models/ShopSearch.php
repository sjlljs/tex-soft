<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Shop;

/**
* ShopSearch represents the model behind the search form about `common\models\Shop`.
*/
class ShopSearch extends Shop
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'firm_id', 'workshop', 'master_choice', 'minus_zp', 'his_clients', 'sms', 'active', 'ticket_type', 'hurry', 'discount', 'complex', 'workshop_choice', 'defect', 'deleted'], 'integer'],
            [['name', 'phone', 'address', 'ispolnitel', 'logo', 'firm_name', 'created_at'], 'safe'],
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
$query = Shop::find();

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
            'firm_id' => $this->firm_id,
            'workshop' => $this->workshop,
            'master_choice' => $this->master_choice,
            'minus_zp' => $this->minus_zp,
            'his_clients' => $this->his_clients,
            'sms' => $this->sms,
            'active' => $this->active,
            'ticket_type' => $this->ticket_type,
            'hurry' => $this->hurry,
            'discount' => $this->discount,
            'complex' => $this->complex,
            'workshop_choice' => $this->workshop_choice,
            'defect' => $this->defect,
            'created_at' => $this->created_at,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'ispolnitel', $this->ispolnitel])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'firm_name', $this->firm_name]);

return $dataProvider;
}
}