<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;
use common\widgets\ModalAjaxForm\ModalAjaxForm;

/**
 * @var yii\web\View $this
 * @var common\models\Service $model
 */

$this->title = Yii::t('app', 'Service') . " " . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Service'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<?= ModalAjaxForm::widget([
    'id' => 'modal-form',
    'clientOptions' => false,
]); ?>

<div class="giiant-crud service-update">

    <h3> <?= Html::a("<span class='glyphicon glyphicon-arrow-left'></span>", ['service/index']) ?> Карточка услуги </h3>

    <hr/>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Основное',
                'content' => $this->render('_form', [
                    'model' => $model,
                ])
            ],
            [
                'label' => 'Наценки',
                'content' => $this->render('_vars', ['model' => $model, 'vars' => $model->vars])
            ],
        ]
    ]) ?>
</div>
