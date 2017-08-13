<?php
/**
 * @var yii\web\View $this
 * @var common\models\Defect $model
 * @var integer $parent_id
 * @var string $form_id
 */

?>

<div class="panel panel-default" id="panel<?= $model->id ?>" data-id="<?= $model->id ?>">
    <div class="panel-heading clearfix">
        <a data-toggle="collapse" data-parent="#level<?= $parent_id ?>" href="#<?= $model->id ?>">
            <?= $model->name ?>
        </a>
        <?= \yii\bootstrap\ButtonDropdown::widget([
            'label' => "",
            'dropdown' => [
                'items' => [
                    [
                        'label' => 'Добавить подкатегорию',
                        'url' => ['defect/create', 'parent' => $model->id],
                        'linkOptions' => ['data-toggle' => 'modal', 'data-target' => "#$form_id",],
                    ],
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
    <div id="<?= $model->id ?>" class="panel-collapse collapse">
        <div class="panel-body" id="level<?= $model->id ?>">
            <?php if (!empty($model->subgroups)): ?>
                <?php foreach ($model->subgroups as $subgroup): ?>
                    <?= $this->render('_panel_subgroup', ['model' => $subgroup, 'form_id' => $form_id,'parent_id'=>"{$model->id}"]) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>