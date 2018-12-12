<?php

namespace backend\modules\personal\controllers;

use Yii;
use common\models\Personal;
use common\models\User;
use backend\modules\personal\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
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
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personal();
        $user = new User();

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            $user->auth_key = Yii::$app->security->generateRandomString();
            if($user->save()) {
                $model->id_user = $user->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user0;
        $oldPass = $user->password_hash;

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if($oldPass != $user->password_hash){
                $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            }
            if($user->save()){
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Personal model.
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
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
