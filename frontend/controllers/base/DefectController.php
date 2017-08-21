<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace frontend\controllers\base;

use common\models\Defect;
use common\models\DefectSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * DefectController implements the CRUD actions for Defect model.
 */
class DefectController extends Controller
{


    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;


    /**
     * Lists all Defect models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$searchModel = new DefectSearch;
        //$dataProvider = $searchModel->search($_GET);
        $dataProvider = new ActiveDataProvider([
            'query' => Defect::find()->isMainGroup()->isNotDeleted()->currentFirm(),
        ]);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            //'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Defect model.
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Defect model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $parent
     * @return mixed
     */
    public function actionCreate($parent = 0)
    {
        $model = new Defect;

        try {
            if ($model->load($_POST)) {
                $model->firm_id = \Yii::$app->user->identity->firm_id;
                $model->pid = $parent;
                if ($model->save())
                    return $this->redirect(['index']);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }

        if (\Yii::$app->request->isAjax)
            return $this->renderPartial('_form_modal', ['model' => $model]);
        else
            return $this->redirect(\Yii::$app->request->referrer);
    }

    /**
     * Updates an existing Defect model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            if (\Yii::$app->request->isAjax)
                return $this->renderPartial('_form_modal', ['model' => $model]);
            else
                return $this->redirect(\Yii::$app->request->referrer);
        }
    }

    /**
     * Deletes an existing Defect model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$id', ',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
            Url::remember(null);
            $url = \Yii::$app->session['__crudReturnUrl'];
            \Yii::$app->session['__crudReturnUrl'] = null;

            return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Defect model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Defect the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Defect::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
