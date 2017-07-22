<?php
namespace console\controllers;

use common\models\User;
use frontend\models\SignupForm;
use yii\console\Controller;
use yii\helpers\VarDumper;

/**
 * Можно создать пользователя.
 *
 * Контроллер нужен для инициализации админа.
 */
class UserController extends Controller
{
    public function actionCreate($username, $email, $password)
    {
        $model = new SignupForm();

        $model->username = $username;
        $model->email = $email;
        $model->password = $password;

        if ($model->validate()) {
            $user = $model->signup();

            if (!$user->hasErrors()) {
                echo 'Success';
                return 0;
            } else {
                VarDumper::dump($user->getErrors());
                return 1;
            }
        } else {
            VarDumper::dump($model->getErrors());
            return 1;
        }
    }

    public function actionCreateDefault()
    {
        $this->actionCreate('admin', 'admin@somewhere.com', 'admin1');
    }

}