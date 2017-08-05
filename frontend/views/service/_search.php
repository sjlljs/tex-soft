<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\ServiceSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'base_cost') ?>

    <?= $form->field($model, 'barcode') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'ticket') ?>

    <?php // echo $form->field($model, 'hint') ?>

    <?php // echo $form->field($model, 'num') ?>

    <?php // echo $form->field($model, 'fixed') ?>

    <?php // echo $form->field($model, 'margin') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
