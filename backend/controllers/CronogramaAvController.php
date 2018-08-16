<?php

namespace backend\controllers;

use Yii;
use backend\models\CronogramaAv;
use backend\models\CronogramaAvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CronogramaAvController implements the CRUD actions for CronogramaAv model.
 */
class CronogramaAvController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CronogramaAv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CronogramaAvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CronogramaAv model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CronogramaAv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CronogramaAv();

        if ($model->load(Yii::$app->request->post())) {
            $model->total = $model->ene + $model->feb + $model->mar + $model->abr + 
                            $model->may + $model->jun + $model->jul + $model->ago + 
                            $model->sep + $model->oct + $model->nov + $model->dic;
            $model->total = $model->total / CantPro();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_ca]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function CantPro()
    {
        $cont = 0;
        $model = new CronogramaAv();

        if($model->ene > 0){
            $cont++;
        }
        if($model->feb > 0){
            $cont++;
        }
        if($model->mar > 0){
            $cont++;
        }
        if($model->abr > 0){
            $cont++;
        }
        if($model->may > 0){
            $cont++;
        }
        if($model->jun > 0){
            $cont++;
        }
        if($model->jul > 0){
            $cont++;
        }
        if($model->ago > 0){
            $cont++;
        }
        if($model->sep > 0){
            $cont++;
        }
        if($model->oct > 0){
            $cont++;
        }
        if($model->nov > 0){
            $cont++;
        }
        if($model->dic > 0){
            $cont++;
        }

        return $cont;
    }

    /**
     * Updates an existing CronogramaAv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->total = $model->ene + $model->feb + $model->mar + $model->abr + 
                            $model->may + $model->jun + $model->jul + $model->ago + 
                            $model->sep + $model->oct + $model->nov + $model->dic;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_ca]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CronogramaAv model.
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
     * Finds the CronogramaAv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CronogramaAv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CronogramaAv::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
