<?php
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var \common\models\ServiceVar[] $vars_list
 * @var common\models\ServiceVar $var
 * @var common\models\Service $model
 * @var yii\widgets\ActiveForm $form
 */

?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="panel panel-info">
        <div class="panel-heading">
            <?= $var->name ?>
            <?= \yii\bootstrap\ButtonDropdown::widget([
                'label' => '',
                'dropdown' => [
                    'items' => [
                        [
                            'label' => 'Редактировать',
                            'url' => ['service-var/update', 'id' => $var->id],
                            'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#modal-form',],
                        ],
                        [
                            'label' => 'Добавить наценку',
                            'url' => ['/service-var/create', 'service' => $model->id, 'parent' => $var->id],
                            'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#modal-form',],
                        ],
                        ['label' => 'Удалить']
                    ],
                ],
                'options' => ['class' => 'btn-link'],
                'containerOptions' => ['class' => 'pull-right'],
            ]) ?>
        </div>
        <?= \yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ArrayDataProvider([
                'allModels' => array_filter($vars_list, function ($v) use ($var) {
                    return ($v->pid == $var->id);
                }),
            ]),
            'layout' => "{items}",
            'showHeader' => false,
            'emptyText' => false,
            'tableOptions' => [
                'class' => 'table table-hover table-condensed',
                'style' => 'margin-bottom:0px',
            ],
            'columns' => [
                [
                    'value' => function ($model) {
                        return "{$model->name} - {$model->add_cost} р.";
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => "{drop}",
                    'buttons' => [
                        'drop' => function ($url, $model, $key) {
                            return \yii\bootstrap\ButtonDropdown::widget([
                                'label' => "",
                                'dropdown' => [
                                    'items' => [
                                        [
                                            'label' => 'Редактировать',
                                            'url' => ['service-var/update', 'id' => $model->id],
                                            'linkOptions' => ['data-toggle' => 'modal', 'data-target' => '#modal-form',],
                                        ],
                                        ['label' => 'Удалить'],
                                    ],
                                ],
                                'containerOptions' => ['class' => 'pull-right'],
                                'options' => ['class' => 'btn-link'],
                            ]);
                        },
                    ],
                ],
            ],
        ]) ?>
    </div>
</div>
