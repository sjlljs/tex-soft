<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\DefectSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="defect-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'pid') ?>

		<?= $form->field($model, 'firm_id') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'picture') ?>

		<?php // echo $form->field($model, 'multi_select') ?>

		<?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
