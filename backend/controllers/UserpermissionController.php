<?php

namespace backend\controllers;

use Yii;
use backend\models\Userpermission;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * UserpermissionController implements the CRUD actions for Userpermission model.
 */
class UserpermissionController extends Controller
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
     * Lists all Userpermission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Userpermission::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * 添加权限
     * @pid 顶级菜单  @fid 二级菜单
     */
    public function actionCreate()
    {
        $model = new Userpermission();

        $pid=$model::find()->select(['permission_name','permission_id'])->where(['type'=>0])->all();
        $fid=$model::find()->select(['permission_name','permission_id'])->where(['type'=>1])->all();

        if ($model->load(Yii::$app->request->post()) &&  $model->validate()) {
            $arot=$model::find()->select(['aort'])->orderBy(['permission_id'=>SORT_DESC])->limit('1')->one();
            $model->aort=$arot->aort+1;
            $model->create_time=time();
            $model->is_delete=0;
            if($model->pid==0 && $model->fid==0){
                $model->type=0;
            }elseif($model->pid!=0 && $model->fid==0){
                $model->type=1;
            }elseif($model->pid!=0 && $model->fid!=0){
                $model->type=2;
            }

            if($model->save()){
                Yii::$app->getSession()->setFlash('success', '保存成功');
            }else{
                Yii::$app->getSession()->setFlash('error', '保存失败');
            }

            return $this->redirect(['rolelist']);
        }

        return $this->render('create', [
            'model' => $model,
            'pid'=>$pid,
            'fid'=>$fid,
        ]);
    }

    /**
     *修改权限
     */
    public function actionEdit()
    {
        $id=Yii::$app->request->get('id');
        $model = $this->findModel($id);
        $pid=$model::find()->select(['permission_name','permission_id'])->where(['type'=>0])->all();
        $fid=$model::find()->select(['permission_name','permission_id'])->where(['type'=>1])->all();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->pid==0 && $model->fid==0){
                $model->type=0;
            }elseif($model->pid!=0 && $model->fid==0){
                $model->type=1;
            }elseif($model->pid!=0 && $model->fid!=0){
                $model->type=2;
            }
            if($model->save()){
                Yii::$app->getSession()->setFlash('success', '修改成功');
            }else{
                Yii::$app->getSession()->setFlash('error', '修改成功');
            }
            return $this->redirect(['rolelist']);
        }

        return $this->render('edit', [
            'model' => $model,
            'pid'=>$pid,
            'fid'=>$fid,
        ]);
    }

    /**
     * Deletes an existing Userpermission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $id=Yii::$app->request->post('id');
        $status=Yii::$app->request->post('status');
        $status=empty($status)?1:0;
        $model=new Userpermission();
        $checkname=$model->checkname($id);
        $data=array();
        if($checkname){
            if($model::updateAll(['is_delete'=>$status],['permission_id'=>$id])){
                $data['code']=1;
                $data['msg']=empty($status)?"开启成功":"关闭成功";
            }else{
                $data['code']=0;
                $data['msg']="修改失败!";
            }

        }else{
            $data['code']=0;
            $data['msg']="该菜单栏存在下级菜单无法关闭!";
        }

        echo json_encode($data);
        exit;
        //return $this->redirect(['index']);
    }


    /**
     * 权限
     */
    public function actionRolelist(){
       $permission_name=Yii::$app->request->get('Userpermission');
        if($permission_name['permission_name']){
            $where=array('permission_name'=>$permission_name['permission_name']);
        }
        $model=new Userpermission();
        $list=$model::find()->where($where)->asArray()->All();

        $data=array();
        foreach ($list as $k=>$v){
            switch ($v['type']){
                case 0:
                    $data[$v['permission_id']]=array(
                        'name'=>$v['permission_name'],
                        'id'=>$v['permission_id'],
                        'type'=>$v['type'],
                        'is_delete'=>$v['is_delete'],
                    );
                    break;
                case 1:
                    $data[$v['pid']]['fid'][$v['permission_id']]=array(
                        'name'=>$v['permission_name'],
                        'id'=>$v['permission_id'],
                        'page'=>$v['permission_route'],
                        'type'=>$v['type'],
                        'is_delete'=>$v['is_delete'],
                    );
                    break;
                case 2:
                    $data[$v['pid']]['fid'][$v['fid']]['list'][$v['permission_id']]=array(
                        'name'=>$v['permission_name'],
                        'id'=>$v['permission_id'],
                        'page'=>$v['permission_route'],
                        'type'=>$v['type'],
                        'is_delete'=>$v['is_delete'],
                    );
                    break;
                default:
                    break;

            }
        }
//        echo "<pre>";
//        var_dump($data);
//        echo "<pre>";
        return $this->render('rolelist',[
            'data'=>$data,
            'model'=>$model,
        ]);

    }

    /**
     * 查询用户信息
     */
    protected function findModel($id)
    {
        if (($model = Userpermission::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的页不存在');
    }

}
