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
        $model = new CronogramaAv();

        $searchModel = new CronogramaAvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionFiltro($id=0)
    {
        echo $id;

        return $this->redirect(['index2', 'id' => $id]);
    }

    public function actionIndex2($id='0')
    {
        $model = new CronogramaAv();

        $searchModel = new CronogramaAvSearch();
        if($id != '0'){
            $searchModel->proyecto = $id;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionPatav()
    {
        $model = new CronogramaAv();

        $searchModel = new CronogramaAvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('patav', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
    public function actionFiltro2($id=0)
    {
        echo $id;

        return $this->redirect(['patav2', 'id' => $id]);
    }

    public function actionPatav2($id='0')
    {
        $model = new CronogramaAv();

        $searchModel = new CronogramaAvSearch();
        if($id != '0'){
            $searchModel->proyecto = $id;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('patav', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionInformeav()
    {
        $model = new CronogramaAv();

        $searchModel = new CronogramaAvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('informeav', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
    public function actionFiltro3($id=0)
    {
        echo $id;

        return $this->redirect(['informeav2', 'id' => $id]);
    }

    public function actionInformeav2($id='0')
    {
        $model = new CronogramaAv();

        $searchModel = new CronogramaAvSearch();
        if($id != '0'){
            $searchModel->proyecto = $id;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('informeav', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionIndexById()
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
            $model->programados = $this->contProgramadosUp($model);
            $model->total = ($model->ene + $model->feb + $model->mar + $model->abr + 
                            $model->may + $model->jun + $model->jul + $model->ago + 
                            $model->sep + $model->oct + $model->nov + $model->dic);
            $model->avance = $this->calAvance($model);
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_ca]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function calAvance($model){
        if($model->programados == 0){
            return 0;
        } else{
            return $model->total / $model->programados;
        }
    }

    public function contProgramadosUp($model){
        $cont = 0;

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
            $model->programados = $this->contProgramadosUp($model);
            $model->total = ($model->ene + $model->feb + $model->mar + $model->abr + 
                            $model->may + $model->jun + $model->jul + $model->ago + 
                            $model->sep + $model->oct + $model->nov + $model->dic);
            $model->avance = $this->calAvance($model);
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_ca]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChart()
    {   
        $data = Yii::$app->db->createCommand('select 
                regional,
                sum(msisdn) as jmlmsisdn,
                sum(bill_amount_1) as jmlba,
                sum(cb_bill_1) as jmlcb,
                sum(cb_bucket_1) as jmlcbu
                from dash_summary_aging_tracking 
                group by regional')->queryAll();

        return $this->render('chart');
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
