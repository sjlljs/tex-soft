<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var common\models\Defect $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Defect');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Defects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud defect-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('app', 'Defect') ?>
        <small>
            <?= $model->name ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit',
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-info']) ?>

            <?= Html::a(
                '<span class="glyphicon glyphicon-copy"></span> ' . 'Copy',
                ['create', 'id' => $model->id, 'Defect' => $copyParams],
                ['class' => 'btn btn-success']) ?>

            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . 'New',
                ['create'],
                ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
                . 'Full list', ['index'], ['class' => 'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('common\models\Defect'); ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pid',
            // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'firm_id',
                'value' => ($model->getFirm()->one() ?
                    Html::a('<i class="glyphicon glyphicon-list"></i>', ['firm/index']) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> ' . $model->getFirm()->one()->name, ['firm/view', 'id' => $model->getFirm()->one()->id,]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'Defect' => ['firm_id' => $model->firm_id]])
                    :
                    '<span class="label label-warning">?</span>'),
            ],
            'multi_select',
            'deleted',
            'picture:ntext',
            'name',
        ],
    ]); ?>


    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Are you sure to delete this item?' . '',
            'data-method' => 'post',
        ]); ?>
    <?php $this->endBlock(); ?>



    <?php $this->beginBlock('ServiceCategories'); ?>
    <div style='position: relative'>
        <div style='position:absolute; right: 0px; top: 0px;'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Service Categories',
                ['service-category/index'],
                ['class' => 'btn text-muted btn-xs']
            ) ?>
            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . 'New' . ' Service Category',
                ['service-category/create', 'ServiceCategory' => ['defect_id' => $model->id]],
                ['class' => 'btn btn-success btn-xs']
            ); ?>
        </div>
    </div>
    <?php Pjax::begin(['id' => 'pjax-ServiceCategories', 'enableReplaceState' => false, 'linkSelector' => '#pjax-ServiceCategories ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <?=
    '<div class="table-responsive">'
    . \yii\grid\GridView::widget([
        'layout' => '{summary}{pager}<br/>{items}{pager}',
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getServiceCategories(),
            'pagination' => [
                'pageSize' => 20,
                'pageParam' => 'page-servicecategories',
            ]
        ]),
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last'
        ],
        'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'contentOptions' => ['nowrap' => 'nowrap'],
                'urlCreator' => function ($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                    $params[0] = 'service-category' . '/' . $action;
                    $params['ServiceCategory'] = ['defect_id' => $model->primaryKey()[0]];
                    return $params;
                },
                'buttons' => [

                ],
                'controller' => 'service-category'
            ],
            'id',
            'pid',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'firm_id',
                'value' => function ($model) {
                    if ($rel = $model->getFirm()->one()) {
                        return Html::a($rel->name, ['firm/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                'format' => 'raw',
            ],
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
            [
                'class' => yii\grid\DataColumn::className(),
                'attribute' => 'shop_id',
                'value' => function ($model) {
                    if ($rel = $model->getShop()->one()) {
                        return Html::a($rel->name, ['shop/view', 'id' => $rel->id,], ['data-pjax' => 0]);
                    } else {
                        return '';
                    }
                },
                'format' => 'raw',
            ],
            'name',
            'num',
            'nalog_type',
            'picture:ntext',
            'deleted',
        ]
    ])
    . '</div>'
    ?>
    <?php Pjax::end() ?>
    <?php $this->endBlock() ?>


    <?= Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => '<b class=""># ' . $model->id . '</b>',
                    'content' => $this->blocks['common\models\Defect'],
                    'active' => true,
                ],
                [
                    'content' => $this->blocks['ServiceCategories'],
                    'label' => '<small>Service Categories <span class="badge badge-default">' . count($model->getServiceCategories()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ],
            ]
        ]
    );
    ?>
</div>
