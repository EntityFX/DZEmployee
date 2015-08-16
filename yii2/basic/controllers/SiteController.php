<?php

namespace app\controllers;

use app\businessLogic\implementation\RatesManager;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\businessLogic\contracts\Employee;
use app\businessLogic\contracts\EmployeeManagerInterface;
use app\businessLogic\implementation\EmployeeManager;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $employeeManager = new EmployeeManager();
        $ratesManager = new RatesManager();
        $employeeData = $employeeManager->getAll();

        $employeeDataProvider = new ArrayDataProvider(([
            'allModels' => iterator_to_array($employeeData)
        ]));
        
        return $this->render(
            'index',
            [
                'model' => $employeeDataProvider,
                'rates' => $ratesManager->getAll()
            ]
        );
    }

    public function actionEdit()
    {
        //TODO: Not implemented
        return "Not implemented";
    }

    public function actionDelete()
    {
        //TODO: Not implemented
        return "Not implemented";
    }

    public function actionAdd()
    {
        //TODO: Not implemented
        return "Not implemented";
    }

    /*public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }*/

}
