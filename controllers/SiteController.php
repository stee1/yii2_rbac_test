<?php

namespace app\controllers;

use app\models\Login;
use app\models\Signup;
use Yii;
use yii\web\Controller;


class SiteController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSignup() {
        $model = new Signup();

        if(isset($_POST['Signup'])) {
            $model->attributes = Yii::$app->request->post('Signup');

            if($model->validate() && $model->signup()) {
                $login_model = new Login();
                $login_model->attributes = Yii::$app->request->post('Signup');
                Yii::$app->user->login($login_model->getUser());
                $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogin() {
        if(!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Login();

        if ( Yii::$app->request->post('Login')) {
            $model->attributes = Yii::$app->request->post('Login');

            if ($model->validate()) {
                Yii::$app->user->login($model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout() {
        if(!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }
}
