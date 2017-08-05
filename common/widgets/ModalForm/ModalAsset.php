<?php
namespace common\widgets\ModalForm;

use yii\web\AssetBundle;


class ModalAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/ModalForm/assets';

    public $js = [
        'js/ajax-modal.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
} 