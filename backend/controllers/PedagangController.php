<?php

namespace backend\controllers;

use common\models\Pedagang;
use backend\models\PedagangSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PedagangController implements the CRUD actions for Pedagang model.
 */
class PedagangController extends Controller
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
     * Lists all Pedagang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PedagangSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedagang model.
     * @param int $id_pedagang Id Pedagang
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pedagang)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pedagang),
        ]);
    }

    /**
     * Creates a new Pedagang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pedagang();

        $model->scenario = 'update';
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->photo = UploadedFile::getInstance($model, 'photo');
                if ($model->validate()) {
                    if (!is_null($model->photo)) {
                        $filename = 'photosPedagang/' . md5(microtime()) . '.' . $model->photo->extension;
                        $model->photo->saveAs($filename);
                        $model->photo = $filename;
                        Yii::$app->getSession()->setFlash('success', '');
                    }
                    $model->save(false);
                    return $this->redirect(['view', 'id_pedagang' => $model->id_pedagang]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,

        ]);
    }

    /**
     * Updates an existing Pedagang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pedagang Id Pedagang
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pedagang)
    {
        $model = $this->findModel($id_pedagang);
        $model->scenario = 'update';
        if ($model->load($this->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()) {
                if (!is_null($model->photo)) {
                    $filename = 'photosPedagang/' . md5(microtime()) . '.' . $model->photo->extension;
                    $model->photo->saveAs($filename);
                    $model->photo = $filename;
                }

                $model->save(false);

                return $this->redirect(['view', 'id_pedagang' => $model->id_pedagang]);
            }
        }

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing Pedagang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pedagang Id Pedagang
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pedagang)
    {
        $this->findModel($id_pedagang)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedagang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pedagang Id Pedagang
     * @return Pedagang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pedagang)
    {
        if (($model = Pedagang::findOne(['id_pedagang' => $id_pedagang])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
