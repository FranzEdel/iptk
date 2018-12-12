<?php

namespace backend\controllers;

use Yii;
use backend\models\Actividades;
use backend\models\ActividadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActividadesController implements the CRUD actions for Actividades model.
 */
class ActividadesController extends Controller
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
     * Lists all Actividades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Actividades();

        $searchModel = new ActividadesSearch();
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
        $model = new Actividades();

        $searchModel = new ActividadesSearch();
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
        $countActividades = Actividades::find()
                ->where(['resultado' => $id])
                ->count();

        $actividades = Actividades::find()
                ->where(['resultado' => $id])
                ->all();
        
        if($countActividades > 0)
        {
            foreach($actividades as $actividad){
                echo "<option value='".$actividad->id_a."'>".$actividad->codigo_a.' - '.$actividad->nombre."</option>";
            }
        }else{
            echo "<option> - </option>";
        }
        
    }

    /**
     * Displays a single Actividades model.
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
     * Creates a new Actividades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Actividades();

        if ($model->load(Yii::$app->request->post())) {
            $model->codigo_a = $model->codigo_a.''.$model->resultado0->codigo_r;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_a]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatemodal($id_p)
    {
        $model = new Actividades();

        if ($model->load(Yii::$app->request->post())) {
            $model->proyecto = $id_p;
            $model->codigo_a = $model->codigo_a.''.$model->resultado0->codigo_r;
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
     * Updates an existing Actividades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->codigo_a = $model->codigo_a.''.$model->resultado0->codigo_r;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_a]);
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
            $model->codigo_a = $model->codigo_a.''.$model->resultado0->codigo_r;
            $model->save();
            return $this->redirect(['proyectos/view', 'id' => $id_p]);
        }

        return $this->renderAjax('updatemodal', [
            'model' => $model,
            'id_p' => $id_p,
        ]);
    }

    /**
     * Deletes an existing Actividades model.
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
     * Finds the Actividades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Actividades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Actividades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
