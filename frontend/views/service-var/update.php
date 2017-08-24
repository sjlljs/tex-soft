<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\ServiceVar $model
*/
    
$this->title = Yii::t('app', 'Service Var') . " " . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Var'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud service-var-update">

    <h1>
        <?= Yii::t('app', 'Service Var') ?>
        <small>
                        <?= $model->name ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
