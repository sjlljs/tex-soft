<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var common\models\ServiceCategory $model
 */
$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Service Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud service-category-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('app', 'Service Category') ?>
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
                ['create', 'id' => $model->id, 'ServiceCategory' => $copyParams],
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

    <?php $this->beginBlock('common\models\ServiceCategory'); ?>


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
                    Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'ServiceCategory' => ['firm_id' => $model->firm_id]])
                    :
                    '<span class="label label-warning">?</span>'),
            ],
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::attributeFormat
            [
                'format' => 'html',
                'attribute' => 'shop_id',
                'value' => ($model->getShop()->one() ?
                    Html::a('<i class="glyphicon glyphicon-list"></i>', ['shop/index']) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> ' . $model->getShop()->one()->name, ['shop/view', 'id' => $model->getShop()->one()->id,]) . ' ' .
                    Html::a('<i class="glyphicon glyphicon-paperclip"></i>', ['create', 'ServiceCategory' => ['shop_id' => $model->shop_id]])
                    :
                    '<span class="label label-warning">?</span>'),
            ],
            'num',
            'nalog_type',
            'del',
            'active',
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



    <?= Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => '<b class=""># ' . $model->id . '</b>',
                    'content' => $this->blocks['common\models\ServiceCategory'],
                    'active' => true,
                ],
            ]
        ]
    );
    ?>
</div>