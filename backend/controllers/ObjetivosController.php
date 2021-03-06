<?php

namespace backend\controllers;

use Yii;
use backend\models\Objetivos;
use backend\models\ObjetivosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjetivosController implements the CRUD actions for Objetivos model.
 */
class ObjetivosController extends Controller
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
     * Lists all Objetivos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Objetivos();
        $searchModel = new ObjetivosSearch();
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
        $model = new Objetivos();

        $searchModel = new ObjetivosSearch();
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
        $countObjetivos = Objetivos::find()
                ->where(['proyecto' => $id])
                ->count();

        $objetivos = Objetivos::find()
                ->where(['proyecto' => $id])
                ->all();
        
        if($countObjetivos > 0)
        {
            foreach($objetivos as $objetivo){
                echo "<option value='".$objetivo->id_o."'>".$objetivo->nombre."</option>";
            }
        }else{
            echo "<option> - </option>";
        }
        
    }
   

    /**
     * Displays a single Objetivos model.
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
     * Creates a new Objetivos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objetivos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_o]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatemodal($id_p)
    {
        $model = new Objetivos();

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
     * Updates an existing Objetivos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_o]);
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
     * Deletes an existing Objetivos model.
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

    public function actionDeletemodelRespaldo($id, $id_p)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['proyectos/view', 'id' => $id_p]);
    }

    public function actionDeletemodal($id, $id_p)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['proyectos/view', 'id' => $id_p]);
 
    }

    /**
     * Finds the Objetivos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objetivos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objetivos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
