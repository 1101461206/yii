<?php

namespace backend\controllers;

use Yii;
use backend\models\Userrole;
use backend\models\userroleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use backend\models\Userpermission;
use backend\models\UserPermissionRelation;

/**
 * UserroleController implements the CRUD actions for Userrole model.
 */
class UserroleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
           // 'myBehavior' => \backend\components\MyBehavior::className(),
            'as access'=>[
                'class' => 'backend\components\AccessControl',
            ],
            'verbs' => [
                'class'=>VerbFilter::className(),
                'actions'=>[
                    'delete'=>['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Userrole models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new userroleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new Userrole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userrole();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->roleid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Userrole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->roleid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Userrole model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * 修改权限
     */
    public function actionRole()
    {
        $model = new UserPermissionRelation();
        $rolemodel = new Userpermission();
        $role_all = $rolemodel->role_all();
        $role_all_def = $model->role_all_def(Yii::$app->request->get('id'));
        $role_name = $this->findModel(Yii::$app->request->get('id'));
        if (Yii::$app->request->isPost && !empty(Yii::$app->request->post('permission_id'))) {
            //var_dump($model->load(Yii::$app->request->post()));
            if ($model->allinster(Yii::$app->request->post())) {
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['index']);
            }
        }

        return $this->render('role', [
            'role_name' => $role_name,
            'role_all' => $role_all,
            'model' => $model,
            'role_all_def' => $role_all_def,

        ]);
    }


    /**
     * Finds the Userrole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userrole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userrole::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
