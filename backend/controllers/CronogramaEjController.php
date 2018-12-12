<?php

namespace backend\controllers;

use Yii;
use backend\models\CronogramaEj;
use backend\models\CronogramaEjSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CronogramaEjController implements the CRUD actions for CronogramaEj model.
 */
class CronogramaEjController extends Controller
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
     * Lists all CronogramaEj models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new CronogramaEj();

        $searchModel = new CronogramaEjSearch();
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
        $model = new CronogramaEj();

        $searchModel = new CronogramaEjSearch();
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

    public function actionPatej()
    {
        $model = new CronogramaEj();

        $searchModel = new CronogramaEjSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('patej', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
    public function actionFiltro2($id=0)
    {
        echo $id;

        return $this->redirect(['patej2', 'id' => $id]);
    }

    public function actionPatej2($id='0')
    {
        $model = new CronogramaEj();

        $searchModel = new CronogramaEjSearch();
        if($id != '0'){
            $searchModel->proyecto = $id;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('patej', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }
    /**
     * Displays a single CronogramaEj model.
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
     * Creates a new CronogramaEj model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CronogramaEj();

        if ($model->load(Yii::$app->request->post())) {

            $model->ene = $this->validateMes($model->ene);
            $model->feb = $this->validateMes($model->feb);
            $model->mar = $this->validateMes($model->mar);
            $model->abr = $this->validateMes($model->abr);
            $model->may = $this->validateMes($model->may);
            $model->jun = $this->validateMes($model->jun);
            $model->jul = $this->validateMes($model->jul);
            $model->ago = $this->validateMes($model->ago);
            $model->sep = $this->validateMes($model->sep);
            $model->oct = $this->validateMes($model->oct);
            $model->nov = $this->validateMes($model->nov);
            $model->dic = $this->validateMes($model->dic);

            $model->total = $model->ene + $model->feb + $model->mar + $model->abr + 
                            $model->may + $model->jun + $model->jul + $model->ago + 
                            $model->sep + $model->oct + $model->nov + $model->dic;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_ce]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function validateMes($mes)
    {
        if($mes != Null){
            return $mes;
        }else{
            return 0;
        }

    }

    /**
     * Updates an existing CronogramaEj model.
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
            return $this->redirect(['view', 'id' => $model->id_ce]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CronogramaEj model.
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
     * Finds the CronogramaEj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CronogramaEj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CronogramaEj::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
