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

            <!-- attribute auth_key -->
            <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

            <!-- attribute password_hash -->
            <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

            <!-- attribute email -->
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <!-- attribute status -->
            <?= $form->field($model, 'status')->textInput() ?>

            <!-- attribute firm_id -->
            <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
            $form->field($model, 'firm_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(common\models\Firm::find()->all(), 'id', 'name'),
                [
                    'prompt' => 'Select',
                    'disabled' => (isset($relAttributes) && isset($relAttributes['firm_id'])),
                ]
            ); ?>

            <!-- attribute password_reset_token -->
            <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

            <!-- attribute first_name -->
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <!-- attribute last_name -->
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
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

