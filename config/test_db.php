<?php

namespace app\controllers;

use yii\web\Controller;

class ImgController extends Controller
{
    
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
}