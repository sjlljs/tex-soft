<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\User $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
            'id' => 'User',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-danger'
        ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            <!-- attribute username -->
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <!-- attribute first_name -->
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <!-- attribute last_name -->
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

            <!-- attribute email -->
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <!-- attribute status -->
            <?= $form->field($model, 'status')->dropDownList(\common\models\User::stateNames()) ?>

            <?= $form->field($model, 'password')->passwordInput(['value'=>$model->password_hash]) ?>
        </p>
        <?php $this->endBlock(); ?>

        <?=
        Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => Yii::t('app', 'User'),
                        'content' => $this->blocks['main'],
                        'active' => true,
                    ],
                ]
            ]
        );
        ?>
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

