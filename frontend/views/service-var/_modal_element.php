<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\ServiceVar $model
 */
?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
]); ?>

    <div class="modal-body">
        <?= $form->field($model,'name')->textInput() ?>
        <?= $form->field($model,'add_cost')->input('number')->label('+ к цене') ?>
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