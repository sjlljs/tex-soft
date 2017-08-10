<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\widgets\ModalAjaxForm\ModalAjaxForm;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\ServiceSearch $searchModel
 */

$this->title = Yii::t('app', 'Services');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">' . $actionColumnTemplateString . '</div>';
?>
<div class="giiant-crud service-index">
    <?= ModalAjaxForm::widget([
        'id' => 'modal-category',
        'clientOptions' => false,
    ]);
    ?>

    <?php
    //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <h1>
        Категории услуг
        <small>
            <?= Html::button("<span class='glyphicon glyphicon-plus'></span>", [
                'class' => 'btn btn-link',
                'title' => 'Новая категория услуг',
                'data-toggle' => 'modal',
                'data-target' => '#modal-category',
                'href' => Url::toRoute('service-category/create')
            ]) ?>
        </small>
    </h1>

    <hr/>

    <div class="clearfix">
        <?php $cats = $categoryProvider->getModels(); ?>
        <?php $panel_id = uniqid() ?>
        <div id="level<?= $panel_id ?>" class="panel-group col-sm-12 col-md-9">
            <?php foreach ($cats as $cat): ?>
                <?= $this->render('_panel_category', ['model' => $cat, 'parent_id' => $panel_id]) ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


