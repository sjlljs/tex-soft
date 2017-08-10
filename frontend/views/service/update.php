<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Service $model
 */

$this->title = Yii::t('app', 'Service') . " " . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud service-update">

    <h3> <?= Html::a("<span class='glyphicon glyphicon-arrow-left'></span>",['service/index']) ?> Карточка услуги </h3>

    <hr/>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]); ?>

</div>
