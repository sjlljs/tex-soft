<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Defect $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="defect-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Defect',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-danger'
        ]
    );
    ?>

    <div class="">
        <p>

            <!-- attribute name -->
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <!-- attribute multi_select -->
            <?= $form->field($model, 'multi_select')->checkbox() ?>

            <!-- attribute picture -->
            <?= $form->field($model, 'picture')->textarea(['rows' => 6]) ?>

        </p>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
            '<span class="glyphicon glyphicon-check"></span> ' .
            ($model->isNewRecord ? 'Create' : 'Save'),
            [
                'id' => 'save-' . $model->formName(),
                'class' => 'btn btn-success'
            ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

