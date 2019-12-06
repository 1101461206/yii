<?php

namespace backend\controllers;

use Yii;
use backend\models\Imsindex;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Awesome;
use backend\models\ImgIndexImg;
use backend\models\ImsIndexImgSearch;
use backend\models\ImscircularSearch;
use backend\models\ImsCircular;

/**
 * ImsindexController implements the CRUD actions for Imsindex model.
 */
class ImsindexController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'myBehavior' => \backend\components\MyBehavior::className(),
            'as access' => [
                'class' => 'backend\components\AccessControl',
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Imsindex models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$model=new ImsIndex();
        $model = $this->findModel(1);
        if ($model->load(Yii::$app->request->post())) {
            $banner = Yii::$app->helper->update_img($model, 'banner', Yii::getAlias('@frontendupload'), 1);

            if ($banner['code'] ==1) {
                $model->banner = !empty($banner['img_url']) ? '/upload/'.$banner['img_url'] : "";
            } elseif ($banner['code'] == 2) {
                unset($model->banner);
                Yii::$app->getSession()->setFlash('error', '未上传图片或图片保存失败');
            }

            if ($model->save()) {
                Yii::$app->plog->ins('imdindex/index','修改banner',1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['index']);
            }else{
                Yii::$app->plog->ins('imdindex/index','修改banner',0);
                Yii::$app->getSession()->setFlash('error', '保存失败');
                return $this->redirect(['index']);
            }

        }

        //   $propaganda = Yii::$app->helper->update_img($model, "propaganda", Yii::getAlias('@frontendupload'),1);

        // $model->propaganda = !empty($propaganda['img_url']) ? $propaganda['img_url'] : "";

        return $this->render('index', [
            'model' => $model,

        ]);
    }

    /**
     * 宣传图片
     */

    public function actionPropaganda(){
        $model = $this->findModel(1);
        $list = $this->awsome_list();
        if($model->load(Yii::$app->request->post())){
            $propaganda=Yii::$app->helper->update_img($model,'propaganda',Yii::getAlias('@frontendupload'),1);

            if($propaganda['code']==1){
                $model->propaganda=!empty($propaganda['img_url'])?'/upload/'.$propaganda['img_url']:"";
            }elseif($propaganda['code']==2){
                unset($model->propaganda);
                Yii::$app->getSession()->setFlash('error', '未上传图片或图片保存失败');
            }

            if ($model->save()) {
                Yii::$app->plog->ins('imdindex/propaganda','修改宣传图文模块',1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['propaganda']);
            }else{
                Yii::$app->plog->ins('imdindex/propaganda','修改宣传图文模块',0);
                Yii::$app->getSession()->setFlash('error', '保存失败');
                return $this->redirect(['propaganda']);
            }


        }
        return $this->render('propaganda',[
            'model'=>$model,
            'list' => $list,
        ]);
    }

    /**
     * 宣传图片文字
     */

    public function actionWords(){
        $model = $this->findModel(1);
        if($model->load(Yii::$app->request->post())){
            if ($model->save()) {
                Yii::$app->plog->ins('imdindex/words','修改宣传文字模块',1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['words']);
            }else{
                Yii::$app->plog->ins('imdindex/words','修改宣传文字模块',0);
                Yii::$app->getSession()->setFlash('error', '保存失败');
                return $this->redirect(['words']);
            }
        }
        return $this->render('words',[
            'model'=>$model,
        ]);
    }

    /**
     * 轮循图片
     */
    public function actionImglist(){
        $searchModel=new ImsIndexImgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('img_list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionImgadd(){
        $model=new ImgIndexImg();
        $model->status = 1;
        $model->img_type = 1;
        if($model->load(Yii::$app->request->post())){
            $img=Yii::$app->helper->update_img($model,'img',Yii::getAlias('@frontendupload'));
            if($img['code']==1){
                $model->img=!empty($img['img_url'])?'/upload/'.$img['img_url']:"";
            }else{
                Yii::$app->getSession()->setFlash('error', '未上传图片或图片保存失败');
            }
            if($model->save()){
                Yii::$app->plog->ins('imdindex/imgadd','添加轮循图片-'.$model->id,1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['imglist']);
            }else{
                Yii::$app->plog->ins('imdindex/imgadd','添加轮循图片',0);
                Yii::$app->getSession()->setFlash('success', '保存失败');
                return $this->redirect(['imglist']);
            }


        }
        return $this->render('img_add',[
            'model'=>$model,
        ]);
    }


    public function actionEdit(){
        $model=$this->findModelimg(Yii::$app->request->get('id'));
        if($model->load(Yii::$app->request->post())){
            $img=Yii::$app->helper->update_img($model,'img',Yii::getAlias('@frontendupload'));
            if($img['code']==1){
                $model->img=!empty($img['img_url'])?'/upload/'.$img['img_url']:"";
            }else{
                unset($model->img);
                Yii::$app->getSession()->setFlash('error', '未上传图片或图片保存失败');
            }
            if($model->save()){
                Yii::$app->plog->ins('imdindex/imgedit','修改轮循图片-'.$model->id,1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['imglist']);
            }else{
                Yii::$app->plog->ins('imdindex/imgedit','修改轮循图片',0);
                Yii::$app->getSession()->setFlash('success', '保存失败');
                return $this->redirect(['imglist']);
            }

        }


        return $this->render('img_edit',[
            'model'=>$model,
        ]);
    }

    /**
     * 修改图片状态
     */

    public function actionImgstatus(){
        $id=Yii::$app->request->post('id');
        $status=Yii::$app->request->post('status');
        $status_num=$status==1?0:1;
        $model=new ImgIndexImg();
        if($model->updateAll(['status'=>$status_num],['id'=>$id])){
            $data=array(
                'code'=>1,
            );
            echo json_encode($data);
        }
        exit;
    }


    /**
     * fa 图标列表
     */

    public function awsome_list()
    {
        $model = new Awesome();
        $list = $model::find()->select(['name'])->asArray()->all();
        $fa_list = "";
        foreach ($list as $k => $v) {
            //$info="<i class='active dm-icon fa fa-".$v['name']." fa-3x'></i>";
            $info = '<li style="float: left; margin:5px; width: 50px; height: 40px; list-style:none"><input name="radioname" type="radio" value="' . $v['name'] . '"><i class="active dm-icon fa fa-' . $v['name'] . ' fa-2x " style="width: 40px;height: 40px;"></i></li>';
            //$fa_list[$v['name']]=$info;
            $fa_list .= $info;
        }
        $fa_list = "<ul>" . $fa_list . "</ul>";
        //$fa_list=json_encode($fa_list);

        return $fa_list;
    }

    /**
     * 三个圆形图标设置
     */

    public function actionCircularlist(){
        $searchModel=new ImscircularSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('circular_list',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    public function actionCircular(){
        $model=new ImsCircular();
        $model->type=0;
        $list=$this->awsome_list();
        if($model->load(Yii::$app->request->post())){

            $img=Yii::$app->helper->update_img($model,'img',Yii::getAlias('@frontendupload'));
            if($img['code']==1){
                $model->img=!empty($img['img_url'])?"/upload/".$img['img_url']:"";
            }else{
                unset($model->img);
                Yii::$app->getSession()->setFlash('error', '未上传图片或图片保存失败');
            }
            if($model->save()){
                Yii::$app->plog->ins('imdindex/circular','添加三圆-'.$model->id,1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['circularlist']);
            }else{
                Yii::$app->plog->ins('imdindex/circular','添加三圆',0);
                Yii::$app->getSession()->setFlash('success', '保存失败');
                return $this->redirect(['circularlist']);
            }

        }

        return $this->render('circular',[
            'model'=>$model,
            'list'=>$list,
        ]);
    }

    public function actionCircularedit(){
        $model=$this->findCircular(Yii::$app->request->get('id'));
        if($model->load(Yii::$app->request->post())){

            $img=Yii::$app->helper->update_img($model,'img',Yii::getAlias('@frontendupload'));
            if($img['code']==1){
                $model->img=!empty($img['img_url'])?"/upload/".$img['img_url']:"";
            }else{
                unset($model->img);
                Yii::$app->getSession()->setFlash('error', '未上传图片或图片保存失败');
            }
            if($model->save()){
                Yii::$app->plog->ins('imdindex/circular','添加三圆-'.$model->id,1);
                Yii::$app->getSession()->setFlash('success', '保存成功');
                return $this->redirect(['circularlist']);
            }else{
                Yii::$app->plog->ins('imdindex/circular','添加三圆',0);
                Yii::$app->getSession()->setFlash('success', '保存失败');
                return $this->redirect(['circularlist']);
            }

        }

        return $this->render('circular',[
            'model'=>$model,
        ]);

    }


    protected function findModel($id)
    {
        if (($model = Imsindex::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelimg($id)
    {
        if (($model = ImgIndexImg::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCircular($id)
    {
        if (($model = ImsCircular::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}


