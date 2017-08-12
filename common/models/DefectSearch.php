<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Defect;

/**
* DefectSearch represents the model behind the search form about `common\models\Defect`.
*/
class DefectSearch extends Defect
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'pid', 'firm_id', 'multi_select', 'deleted'], 'integer'],
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
$query = Defect::find();

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
            'multi_select' => $this->multi_select,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'picture', $this->picture]);

return $dataProvider;
}
}