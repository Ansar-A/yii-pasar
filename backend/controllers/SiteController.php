<?php

namespace backend\controllers;

use backend\models\SignupForm;
use common\models\LoginForm;
use common\models\Pasar;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout',  'index'],
                'rules' => [
                    [
                        'actions' => ['login',  'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $DB = Yii::$app->db;
        $ts = $DB->createCommand("SELECT *, COUNT(id_pedagang) AS total FROM pedagang GROUP BY get_pasar;")->queryAll();
        $namaPasar = Pasar::find()->groupBy('nama_pasar')->all();

        return $this->render('index', compact('ts', 'namaPasar'));
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        $this->layout = 'mainLogin';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionSignup()
    {
        $this->layout = 'mainSignup';
        $model = new SignupForm();
        if ($model->load($this->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()) {
                if (!is_null($model->photo)) {
                    $filename = 'photos/' . md5(microtime()) . '.' . $model->photo->extension;
                    $model->photo->saveAs($filename);
                    $model->photo = $filename;
                }
                $model->signup();
                return $this->goHome();
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
