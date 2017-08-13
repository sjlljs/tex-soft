<?php
/**
 * @var yii\web\View $this
 * @var common\models\Defect $model
 * @var integer $parent_id
 * @var string $form_id
 */

?>

<div class="clearfix">
    <?= \yii\helpers\Html::a($model->name, ['defect/update', 'id' => $model->id],[
        'data-toggle' => 'modal',
        'data-target' => "#$form_id",
    ]) ?>
    <?= \yii\bootstrap\ButtonDropdown::widget([
        'label' => "",
        'dropdown' => [
            'items' => [
                [
                    'label' => 'Редактировать',
                    'url' => ['defect/update', 'id' => $model->id],
                    'linkOptions' => ['data-toggle' => 'modal', 'data-target' => "#$form_id",],
                ],
                ['label' => 'Удалить'],
            ],
        ],
        'containerOptions' => [
            'class' => 'pull-right',
        ],
        'options' => [
            'class' => 'btn-link',
        ],
        'encodeLabel' => false,
    ]) ?>
</div>
