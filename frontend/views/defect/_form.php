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
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute pid -->
			<?= $form->field($model, 'pid')->textInput() ?>

<!-- attribute firm_id -->
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'firm_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\Firm::find()->all(), 'id', 'name'),
    [
        'prompt' => 'Select',
        'disabled' => (isset($relAttributes) && isset($relAttributes['firm_id'])),
    ]
); ?>

<!-- attribute multi_select -->
			<?= $form->field($model, 'multi_select')->textInput() ?>

<!-- attribute deleted -->
			<?= $form->field($model, 'deleted')->textInput() ?>

<!-- attribute picture -->
			<?= $form->field($model, 'picture')->textarea(['rows' => 6]) ?>

<!-- attribute name -->
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('app', 'Defect'),
    'content' => $this->blocks['main'],
    'active'  => true,
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

