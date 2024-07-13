<?php

namespace backend\controllers;

use common\models\Instansi;
use backend\models\InstansiSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InstansiController implements the CRUD actions for Instansi model.
 */
class InstansiController extends Controller
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
     * Lists all Instansi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InstansiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Instansi model.
     * @param int $id_instansi Id Instansi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_instansi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_instansi),
        ]);
    }

    /**
     * Creates a new Instansi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Instansi();

        $model->scenario = 'update';
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->photo = UploadedFile::getInstance($model, 'photo');
                if ($model->validate()) {
                    if (!is_null($model->photo)) {
                        $filename = 'photosInstansi/' . md5(microtime()) . '.' . $model->photo->extension;
                        $model->photo->saveAs($filename);
                        $model->photo = $filename;
                        Yii::$app->getSession()->setFlash('success', '');
                    }
                    $model->save(false);
                    return $this->redirect(['view', 'id_instansi' => $model->id_instansi]);
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
     * Updates an existing Instansi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_instansi Id Instansi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_instansi)
    {
        $model = $this->findModel($id_instansi);

        if ($model->load($this->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()) {
                if (!is_null($model->photo)) {
                    $filename = 'photosInstansi/' . md5(microtime()) . '.' . $model->photo->extension;
                    $model->photo->saveAs($filename);
                    $model->photo = $filename;
                }

                $model->save(false);

                return $this->redirect(['view', 'id_instansi' => $model->id_instansi]);
            }
        }

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing Instansi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_instansi Id Instansi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_instansi)
    {
        $this->findModel($id_instansi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Instansi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_instansi Id Instansi
     * @return Instansi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_instansi)
    {
        if (($model = Instansi::findOne(['id_instansi' => $id_instansi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
