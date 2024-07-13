<?php

namespace backend\controllers;

use common\models\Pasar;
use backend\models\PasarSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Response;

/**
 * PasarController implements the CRUD actions for Pasar model.
 */
class PasarController extends Controller
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
     * Lists all Pasar models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PasarSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pasar model.
     * @param int $id_pasar Id Pasar
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pasar)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pasar),
        ]);
    }

    /**
     * Creates a new Pasar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pasar();
        $model->scenario = 'update';
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->photo_depan = UploadedFile::getInstance($model, 'photo_depan');
               
                $model->photo_dalam = UploadedFile::getInstance($model, 'photo_dalam');
              

                if ($model->photo_depan != null  && $model->photo_dalam != null  && $model->validate()) {
                   
                    $filenameDepan = 'photosDepan/' . md5(microtime()) . '.' . $model->photo_depan->extension;
                 
                    $filenameDalam = 'photosDalam/' . md5(microtime()) . '.' . $model->photo_dalam->extension;

                   
                    $model->photo_depan->saveAs($filenameDepan);
                   
                    $model->photo_dalam->saveAs($filenameDalam);

                   
                    $model->photo_depan = $filenameDepan;
                   
                    $model->photo_dalam = $filenameDalam;
                    Yii::$app->getSession()->setFlash('success', 'File berhasil diunggah.');
                    $model->save(false);
                    return $this->redirect(['view', 'id_pasar' => $model->id_pasar]);
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
     * Updates an existing Pasar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pasar Id Pasar
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pasar)
    {
        $model = $this->findModel($id_pasar);
        $model->scenario = 'update';

        if ($model->load($this->request->post())) {
            $model->photo_depan = UploadedFile::getInstance($model, 'photo_depan');
        
            $model->photo_dalam = UploadedFile::getInstance($model, 'photo_dalam');
           
            if ($model->validate()) {
                if (!is_null($model->photo_depan && $model->photo_belakang && $model->photo_kiri && $model->photo_kanan && $model->photo_dalam && $model->sertifikasi)) {
                    $filenameDepan = 'photosDepan/' . md5(microtime()) . '.' . $model->photo_depan->extension;
                 
                    $filenameDalam = 'photosDalam/' . md5(microtime()) . '.' . $model->photo_dalam->extension;
                   
                    $model->photo_depan->saveAs($filenameDepan);
                   
                    $model->photo_dalam->saveAs($filenameDalam);
                
                    $model->photo_depan = $filenameDepan;
                 
                    $model->photo_dalam = $filenameDalam;
                    
                }
                $model->save(false);
                return $this->redirect(['view', 'id_pasar' => $model->id_pasar]);
            }
        }
     

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing Pasar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pasar Id Pasar
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pasar)
    {
        $this->findModel($id_pasar)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pasar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pasar Id Pasar
     * @return Pasar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pasar)
    {
        if (($model = Pasar::findOne(['id_pasar' => $id_pasar])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
