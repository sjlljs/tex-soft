<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Firm $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Фирма', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud firm-create">

    <h1>
        <?= 'Фирма' ?>
        <small>
                        <?= $model->name ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
