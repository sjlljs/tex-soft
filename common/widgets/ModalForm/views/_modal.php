<?php
use yii\bootstrap\Modal;

/**
 * @var $this \yii\web\View
 */

Modal::begin([
    'id' => 'ajax-modal',
    'header' => '<h2 class="modal-title"></h2>',
]);

Modal::end();