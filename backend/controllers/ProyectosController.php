<?php

namespace backend\controllers;

use Yii;
use backend\models\Proyectos;
use backend\models\ProyectosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\widgets\ActiveForm;
use backend\models\ObjetivosSearch;
use backend\models\ResultadosSearch;
use backend\models\IndicadoresSearch;
use backend\models\ActividadesSearch;
use backend\models\CronogramaAvSearch;
use backend\models\CronogramaEjSearch;
use backend\models\Eventos;

/**
 * ProyectosController implements the CRUD actions for Proyectos model.
 */
class ProyectosController extends Controller
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
     * Lists all Proyectos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProyectosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Proyectos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //Objetivos ById
        //$searchModel = new ObjetivosSearch();
        //$dataProvider = $searchModel->searchById(Yii::$app->request->queryParams, $id);

        //Objetivos
        $searchModel = new ObjetivosSearch();
        $searchModel->proyecto = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Resultados
        $searchModelRe = new ResultadosSearch();
        $searchModelRe->proyecto = $id;
        $dataProviderRe = $searchModelRe->search(Yii::$app->request->queryParams);

        //Indicadores
        $searchModelIn = new IndicadoresSearch();
        $searchModelIn->proyecto = $id;
        $dataProviderIn = $searchModelIn->search(Yii::$app->request->queryParams);
        
        //Actividades
        $searchModelAc = new ActividadesSearch();
        $searchModelAc->proyecto = $id;
        $dataProviderAc = $searchModelAc->search(Yii::$app->request->queryParams);


        //Cronograma de Avance en General
        $searchModelAv = new CronogramaAvSearch();
        $dataProviderAv = $searchModelAv->searchByPro(Yii::$app->request->queryParams, $id);

        //Cronograma de Ejecucion en General
        $searchModelEj = new CronogramaEjSearch();
        $dataProviderEj = $searchModelEj->searchByPro(Yii::$app->request->queryParams, $id);

        //Eventos ById
        $eventos = Eventos::find()->where(['proyecto' => $id])->all();

        $datos = [];

        foreach ($eventos as $eve) {
            $evento = new \yii2fullcalendar\models\Event();
            $evento->id = $eve->id;
            $evento->title = $eve['titulo'];
            $evento->start = $eve['fecha_creacion'];
            $evento->borderColor = 'black';
            $evento->color = 'red';
            $evento->backgroundColor = 'orange';
            $datos[] = $evento; 

        }

        //Envio a la vista
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelRe' => $searchModelRe,
            'dataProviderRe' => $dataProviderRe,
            'searchModelIn' => $searchModelIn,
            'dataProviderIn' => $dataProviderIn,
            'eventos' => $datos,
            'searchModelAc' => $searchModelAc,
            'dataProviderAc' => $dataProviderAc,
            'searchModelAv' => $searchModelAv,
            'dataProviderAv' => $dataProviderAv,
            'searchModelEj' => $searchModelEj,
            'dataProviderEj' => $dataProviderEj,
            'objetivo' => $searchModel->nombre,
            'proyectoId' => $searchModel->id_o,
            
        ]);
    }

    /**
     * Creates a new Proyectos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proyectos();

        if( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) ) {
            Yii::$app->response->format = 'json';
            return Activeform::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                echo json_encode(['status' => 'Success', 'message' => 'Registro realizado']);
            }else{
                echo json_encode(['status' => 'Error', 'message' => 'Registro no realizado']);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Proyectos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_p]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Proyectos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteRespaldo($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        if (!Yii::$app->request->isAjax) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Proyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proyectos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
