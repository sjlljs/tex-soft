<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\ServiceCategorySearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="service-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'firm_id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'num') ?>

    <?php // echo $form->field($model, 'nalog_type') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'del') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
