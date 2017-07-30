<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var common\models\Shop $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="shop-form">

    <?php $form = ActiveForm::begin([
            'id' => 'Shop',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-danger'
        ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>

            <!-- attribute name -->
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <!-- attribute firm_name -->
            <?= $form->field($model, 'firm_name')->textInput(['maxlength' => true]) ?>

            <!-- attribute phone -->
            <?= $form->field($model, 'phone')->textarea(['rows' => 6]) ?>

            <!-- attribute address -->
            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

            <!-- attribute ispolnitel -->
            <?= $form->field($model, 'ispolnitel')->textarea(['rows' => 6]) ?>

            <!-- attribute logo -->
            <?= $form->field($model, 'logo')->textarea(['rows' => 6]) ?>

            <!-- attribute workshop -->
            <?= $form->field($model, 'workshop')->checkbox() ?>

            <!-- attribute master_choice -->
            <?= $form->field($model, 'master_choice')->checkbox() ?>

            <!-- attribute minus_zp -->
            <?= $form->field($model, 'minus_zp')->textInput() ?>

            <!-- attribute his_clients -->
            <?= $form->field($model, 'his_clients')->checkbox() ?>

            <!-- attribute sms -->
            <?= $form->field($model, 'sms')->checkbox() ?>

            <!-- attribute ticket_type -->
            <?= $form->field($model, 'ticket_type')->textInput() ?>

            <!-- attribute hurry -->
            <?= $form->field($model, 'hurry')->checkbox() ?>

            <!-- attribute discount -->
            <?= $form->field($model, 'discount')->checkbox() ?>

            <!-- attribute complex -->
            <?= $form->field($model, 'complex')->checkbox() ?>

            <!-- attribute workshop_choice -->
            <?= $form->field($model, 'workshop_choice')->checkbox() ?>

            <!-- attribute defect -->
            <?= $form->field($model, 'defect')->checkbox() ?>

            <!-- attribute deleted -->
            <?= $form->field($model, 'deleted')->checkbox() ?>

            <!-- attribute active -->
            <?= $form->field($model, 'active')->checkbox() ?>

        </p>
        <?php $this->endBlock(); ?>

        <?=
        Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => Yii::t('app', 'Shop'),
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

