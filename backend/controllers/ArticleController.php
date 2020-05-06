<?php

namespace backend\controllers;

use common\components\Helper;
use Yii;
use backend\models\ImsArticle;
use backend\models\imsArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
/**
 * ImsArticleController implements the CRUD actions for ImsArticle model.
 */
class ArticleController extends Controller
{

    /**
     * 新闻列表
     */
    public function actionIndex()
    {
        $searchModel = new imsArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $type = Yii::$app->db->createCommand('select tid,`name` from ims_article_type')->queryAll();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'type'=>$type,
            'article_category'=>$type,
        ]);
    }

    /**
     *添加新闻
     */
    public function actionAdd()
    {
        $model = new ImsArticle();
        $type = Yii::$app->db->createCommand('select tid,`name` from ims_article_type')->queryAll();
        $username=Yii::$app->user->identity->nickname;
        if ($model->load(Yii::$app->request->post())) {
            $model->article_author=$username;
            $model->save();
            return $this->redirect('index');
            exit;
        }
        $model->recommendation = 0;
        $model->top = 0;
        $model->status=1;
        return $this->render('add', [
            'model' => $model,
            'type'  => $type,
        ]);
    }

    /**
     * 修改文章
     */
    public function actionEdit($id)
    {
        $model = $this->findModel($id);

        $type = Yii::$app->db->createCommand('select tid,`name` from ims_article_type')->queryAll();
        $username=Yii::$app->user->identity->nickname;
        if ($model->load(Yii::$app->request->post())) {
            $model->article_author=$username;
            $model->save();
            return $this->redirect('index');
            exit;
        }
        $model->recommendation = 0;
        $model->top = 0;
        $model->status=1;
        return $this->render('edit', [
            'model' => $model,
            'type'  => $type,
        ]);
    }

    /**
     * Deletes an existing ImsArticle model.
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
     * 修改状态
     */
    public function actionStatus(){
        $info=Yii::$app->request->post();
        $status=empty($info['status'])?1:0;
        $model=new ImsArticle();
        $up=$model->updateall(['status'=>$status],['id'=>$info['id']]);
        if($up){
            $Hap=new Helper();
            return $Hap->mages_format('1');
            exit;
        }
    }

    /**
     * 查询用户信息
     */
    protected function findModel($id)
    {
        if (($model = ImsArticle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的页不存在');
    }

}
