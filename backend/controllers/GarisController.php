<?php

namespace backend\controllers;

use common\models\Garis;
use backend\models\GarisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GarisController implements the CRUD actions for Garis model.
 */
class GarisController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Garis models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GarisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Garis model.
     * @param int $id_garis Id Garis
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_garis)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_garis),
        ]);
    }

    /**
     * Creates a new Garis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Garis();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_garis' => $model->id_garis]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Garis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_garis Id Garis
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_garis)
    {
        $model = $this->findModel($id_garis);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_garis' => $model->id_garis]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Garis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_garis Id Garis
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_garis)
    {
        $this->findModel($id_garis)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Garis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_garis Id Garis
     * @return Garis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_garis)
    {
        if (($model = Garis::findOne(['id_garis' => $id_garis])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
