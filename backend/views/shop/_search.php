<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\ShopSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="shop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firm_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'ispolnitel') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'firm_name') ?>

    <?php // echo $form->field($model, 'workshop') ?>

    <?php // echo $form->field($model, 'master_choice') ?>

    <?php // echo $form->field($model, 'minus_zp') ?>

    <?php // echo $form->field($model, 'his_clients') ?>

    <?php // echo $form->field($model, 'sms') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'ticket_type') ?>

    <?php // echo $form->field($model, 'hurry') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'complex') ?>

    <?php // echo $form->field($model, 'workshop_choice') ?>

    <?php // echo $form->field($model, 'defect') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
