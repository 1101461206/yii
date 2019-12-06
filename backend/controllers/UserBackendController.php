<?php

namespace backend\controllers;

use backend\models\Userpermission;
use backend\models\UserPermissionRelation;
use common\components\Helper;
use Yii;
use backend\models\UserBackend;
use backend\models\UserBackendSerach;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AdduserForm;
//use backend\components\Log;

/**
 * UserBackendController implements the CRUD actions for UserBackend model.
 */
class UserBackendController extends Controller
{

    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            // 'myBehavior' => \backend\components\MyBehavior::className(),
//            'as access'=>[
//                'class' => 'backend\components\AccessControl',
//            ],
//            'verbs' => [
//                'class'=>VerbFilter::className(),
//                'actions'=>[
//                    'delete'=>['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all UserBackend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserBackendSerach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $role_name = Yii::$app->db->createCommand('select roleid,role_name from user_role')->queryAll();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'role_name'=>$role_name,
        ]);
    }


    /**
     * 添加用户
     */

    public function actionAdduser()
    {
        $model = new AdduserForm();
        $role_name = Yii::$app->db->createCommand('select roleid,role_name from user_role')->queryAll();
        if ($model->load(Yii::$app->request->post())) {
            $thumb = Yii::$app->helper->update_img($model, 'thumb', Yii::getAlias('@backendupload'));
            $img = Yii::$app->helper->update_img($model, "img", Yii::getAlias('@backendupload'));
            if ($thumb['code'] < 2 && $img['code'] < 2) {
                $model->thumb = !empty($thumb['img_url']) ? $thumb['img_url'] : "";
                $model->img = !empty($img['img_url']) ? $img['img_url'] : "";
            } elseif ($img['code'] == 2) {
                Yii::$app->getSession()->setFlash('error', '保存失败');
            }
            if ($model->signup()) {
                Yii::$app->plog->ins('user-backend/adduser','添加管理员--'.$model->username,1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['index']);
            }

        }
        //默认选中
        $model->status = 1;
        return $this->render('adduser', [
            'model' => $model,
            'role_name' => $role_name,
        ]);
    }

    /**
     * 修改
     */

    public function actionEdit()
    {
        $id = Yii::$app->request->get('id');
        $model = $this->findModel($id);
        $role_name = Yii::$app->db->createCommand('select roleid,role_name from user_role')->queryAll();
        if (Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post())) {
                $img = Yii::$app->helper->update_img($model, "img", Yii::getAlias('@backendupload'));
                $thumb = Yii::$app->helper->update_img($model, 'thumb', Yii::getAlias('@backendupload'));
                if ($thumb['code'] < 2 && $img['code'] < 2) {
                    $model->thumb = !empty($thumb['img_url']) ? $thumb['img_url'] : "";
                    $model->img = !empty($img['img_url']) ? $img['img_url'] : "";
                } elseif ($img['code'] == 2) {
                    Yii::$app->getSession()->setFlash('error', '修改失败');
                }
                $model->updated_at=time();
                if ($model->save()) {
                    Yii::$app->plog->ins('user-backend/edit','修改管理员--'.$model->username,1);
                    Yii::$app->getSession()->setFlash('success', '修改成功');
                    return $this->redirect(['index']);
                }
            }
        }
        return $this->render('edit', [
            'model' => $model,
            'role_name' => $role_name,
        ]);
    }



    /**
     * Deletes
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');
        $data = array();
        $info=$this->findModel($id);
        if ($id && $this->findModel($id)->delete()) {
            Yii::$app->plog->ins('user-backend/delete','删除管理员--'.$info->username,1);
            $data['code'] = 1;
        } else {
            $data['code'] = 0;
        }
        echo json_encode($data);
        exit;
    }

    /**
     * 管理员重置密码
     */

    public function actionResetpass(){
        $id = Yii::$app->request->get('id');
        $model=$this->findModel($id);
        if($model->load(Yii::$app->request->post())){
            $salt=Yii::$app->getSecurity()->generateRandomString(6);
            $new=new UserBackend();
            $pass=$new::newpass($model->password_hash,$salt);
            $model->password_hash=$pass;
            $model->salt=$salt;
            $model->updated_at=time();
            if($model->save()){
                Yii::$app->plog->ins('user-backend/delete','修改密码--'.$model->username,1);
                Yii::$app->getSession()->setFlash('success', '修改成功');
            }else{
                Yii::$app->getSession()->setFlash('success', '修改失败');
            }
            return $this->redirect(['index']);
        }

        $model->password_hash="";
        return $this->render('resetpass',[
            'model'=>$model,
        ]);
    }


    /**
     * 查询用户信息
     */
    protected function findModel($id)
    {
        if (($model = UserBackend::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的页不存在');
    }




}
