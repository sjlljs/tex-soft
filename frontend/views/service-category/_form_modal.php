<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\ServiceCategory $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<?php $form = ActiveForm::begin([
        'id' => 'ServiceCategory',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
    ]
);
?>

<div class="modal-body">
    <p>
        <!-- attribute name -->
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <!-- attribute nalog_type -->
        <?= $form->field($model, 'nalog_type')->dropDownList(\common\models\ServiceCategory::NalogNames()) ?>

        <!-- attribute active -->
        <?= $form->field($model, 'active')->checkbox([],false) ?>

        <!-- attribute picture -->
        <?= $form->field($model, 'picture')->textarea(['rows' => 6]) ?>

    </p>
    <hr/>

    <?php echo $form->errorSummary($model); ?>

</div>

<div class="modal-footer">
    <div class="pull-left">
        <?= Html::button(
            'Отмена',
            ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>
    </div>

    <div class="pull-right">
        <?= Html::submitButton(
            ($model->isNewRecord ? 'Создать' : 'Сохранить'),
            [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-primary'
            ]
        );
        ?>
    </div>
</div>

<?php ActiveForm::end(); ?>


