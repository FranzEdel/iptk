<?php

namespace backend\controllers;

use Yii;
use backend\models\Resultados;
use backend\models\ResultadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultadosController implements the CRUD actions for Resultados model.
 */
class ResultadosController extends Controller
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
     * Lists all Resultados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Resultados();
        $searchModel = new ResultadosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionFiltro($id=0)
    {
        return $this->redirect(['index2', 'id' => $id]);
    }

    public function actionIndex2($id='0')
    {
        $model = new Resultados();

        $searchModel = new ResultadosSearch();
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

    public function actionLists($id)
    {
        $countResultados = Resultados::find()
                ->where(['proyecto' => $id])
                ->count();

        $resultados = Resultados::find()
                ->where(['proyecto' => $id])
                ->all();
        
        if($countResultados > 0)
        {
            foreach($resultados as $resultado){
                echo "<option value='".$resultado->id_r."'>".$resultado->codigo_r.' - '.$resultado->nombre."</option>";
            }
        }else{
            echo "<option> - </option>";
        }
        
    }

    /**
     * Displays a single Resultados model.
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

    public function actionViewmodal($id, $id_p)
    {
        return $this->renderAjax('viewmodal', [
            'model' => $this->findModel($id),
            'id_p' => $id_p,
        ]);
    }

    /**
     * Creates a new Resultados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resultados();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_r]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatemodal($id_p)
    {
        $model = new Resultados();

        if ($model->load(Yii::$app->request->post())) {
            $model->proyecto = $id_p;
            if($model->save()){
                echo json_encode(['status' => 'Success', 'message' => 'Registro realizado']);
            }else{
                echo json_encode(['status' => 'Error', 'message' => 'Registro no realizado']);
            }
            return $this->redirect(['proyectos/view', 'id' => $id_p]);
        } else {
            return $this->renderAjax('createmodal', [
                'model' => $model,
                'id_p' => $id_p,
            ]);
        }
    }

    /**
     * Updates an existing Resultados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_r]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdatemodal($id, $id_p)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->proyecto = $id_p;
            $model->save();
            return $this->redirect(['proyectos/view', 'id' => $id_p]);
        }

        return $this->renderAjax('updatemodal', [
            'model' => $model,
            'id_p' => $id_p,
        ]);
    }

    /**
     * Deletes an existing Resultados model.
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

    public function actionDeletemodal($id, $id_p)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['proyectos/view', 'id' => $id_p]);
 
    }

    /**
     * Finds the Resultados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resultados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resultados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
