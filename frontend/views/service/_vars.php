<?php
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var \common\models\ServiceVar[] $vars
 * @var common\models\Service $model
 * @var yii\widgets\ActiveForm $form
 */

?>

    <p></p>

<?= Html::button("<span class='glyphicon glyphicon-plus'></span>Новая группа", [
    'class' => 'btn btn-primary',
    'title' => 'Добавить',
    'data-toggle' => 'modal',
    'data-target' => '#modal-form',
    'href' => Url::toRoute(['/service-var/create', 'service' => $model->id, 'parent' => 0])
]) ?>

    <div class="clearfix"><p></p></div>

<?php foreach ($vars as $var): ?>
    <?php if (empty($var->pid)): ?>
        <?= $this->render('_vars_card', ['model' => $model, 'var' => $var, 'vars_list' => $vars]) ?>
    <?php endif; ?>
<?php endforeach; ?>