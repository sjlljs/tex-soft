<?php
/**
 * @var common\models\ServiceCategory $model
 * @var integer $parent_id
 */

?>
<div class="panel panel-default" id="panel<?= $model->id ?>" data-id="<?= $model->id ?>">
    <div class="panel-heading clearfix">
        <a data-toggle="collapse" data-parent="#level<?= $parent_id ?>" href="#<?= $model->id ?>">
            <?= $model->name ?><span class="badge">0</span>
        </a>
        <?= \yii\bootstrap\ButtonDropdown::widget([
            'label' => "",
            'dropdown' => [
                'items' => [
                    ['label' => 'Печать прейскуранта'],
                    [
                        'label' => 'Добавить подкатегорию',
                        'url' => ['service-category/create', 'parent' => $model->id],
                        'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#modal-category',],
                    ],
                    ['label' => 'Удалить категорию'],
                    [
                        'label' => 'Редактировать категорию',
                        'url' => ['service-category/update', 'id' => $model->id],
                        'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#modal-category',],
                    ],
                    ['label' => 'Добавить услугу', 'url' => ['service/create', 'category' => $model->id]],
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
            <?php if (!empty($model->subcategories)): ?>
                <?php $panel_id = uniqid() ?>
                <?php foreach ($model->subcategories as $cat): ?>
                    <?= $this->render('_panel_category', ['model' => $cat, 'parent_id' => $panel_id]) ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!empty($model->services)): ?>
                <?php foreach ($model->services as $service): ?>
                    <div class="clearfix">
                        <?= \yii\helpers\Html::a("$service->name - $service->base_cost р.", ['service/update', 'id' => $service->id]) ?>
                        <?= \yii\bootstrap\ButtonDropdown::widget([
                            'label' => "",
                            'dropdown' => [
                                'items' => [
                                    ['label' => 'Печать этикетки'],
                                    [
                                        'label' => 'Редактировать',
                                        'url' => ['service/update', 'id' => $service->id],
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
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>