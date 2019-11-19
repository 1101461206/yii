<?php

namespace backend\controllers;

use common\models\User;
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
     * 添加角色
     */
    public function actionCreate()
    {

        $model = new Userrole();
        $rolemodel = new Userpermission();
        $role_all = $rolemodel->role_all();

        if ($model->load(Yii::$app->request->post()) ) {
           if($model->in_role(Yii::$app->request->post())){
               Yii::$app->getSession()->setFlash('success', '保存成功');
               return $this->redirect(['index']);
           }else{
               Yii::$app->getSession()->setFlash('erroe', '保存失败');
               return $this->redirect(['index']);
           }
        }

        return $this->render('create', [
            'model' => $model,
            'role_all'=>$role_all,
        ]);
    }

    /**
     * 修改角色
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
     * 删除
     */
    public function actionDelete()
    {
        $id=Yii::$app->request->post('id');
        $model=new Userrole();
        $check_role=$model->check_role($id);
        if($check_role){
            $info=$this->findModel($id)->delete();
            $data['code']=$info ?1:0;
            if(empty($data['code'])){
                $data['msg']="删除失败";
            }
        }else{
            $data['code']=0;
            $data['msg']="该角色有用户在使用,无法删除!";
        }
        echo json_encode($data);
        exit;
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
                $cache_id="role".Yii::$app->request->get('id');
                if(Yii::$app->cache->get($cache_id)){
                    Yii::$app->cache->delete($cache_id);
                }
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
     * 修改状态
     */
    public function actionUserStatus(){
        $info=Yii::$app->request->post();
        $status=$info['status']==0?1:0;
        $model=new Userrole();
        if($model::updateAll(['is_delete'=>$status],['roleid'=>$info['id']])){
            $data=array(
                'code'=>1,
            );
            echo json_encode($data);
        }

        exit;
    }

    public function actionEditName(){
        $info=Yii::$app->request->post();
        $model=new Userrole();
        if($model::updateAll(['role_name'=>$info['name']],['roleid'=>$info['id']])){
            $data=array(
                'code'=>1,
            );
        }else{
            $data=array(
                'code'=>0,
            );
        }
        echo json_encode($data);
        exit;

    }


    /**
     * 查询用户信息
     */
    protected function findModel($id)
    {
        if (($model = Userrole::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的页不存在');
    }


    public function actionCeshi(){
        echo "1";



    }

}
