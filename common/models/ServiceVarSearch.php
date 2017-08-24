<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ServiceVar;

/**
* ServiceVarSearch represents the model behind the search form about `common\models\ServiceVar`.
*/
class ServiceVarSearch extends ServiceVar
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'service_id', 'pid', 'add_cost', 'multi_select'], 'integer'],
            [['name'], 'safe'],
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
$query = ServiceVar::find();

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
            'service_id' => $this->service_id,
            'pid' => $this->pid,
            'add_cost' => $this->add_cost,
            'multi_select' => $this->multi_select,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

return $dataProvider;
}
}