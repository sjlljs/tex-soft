<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\ServiceVarSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="service-var-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'service_id') ?>

		<?= $form->field($model, 'pid') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'add_cost') ?>

		<?php // echo $form->field($model, 'multi_select') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
