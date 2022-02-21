<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Img;

class ImgController extends Controller
{
    // ...existing code...



    // public function actionSay($message = 'Hello')
    // {
    //     return $this->render('say', ['message' => $message]);
    // }

    public function actionUpload()
    {
        $model = new Img();

        if (Yii::$app->request->isPost) {
            $model->eventImage = UploadedFile::getInstance($model, 'eventImage');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    // public function actionUpload($id) {

    //     $model = $this->findModel($id);

    //      if (Yii::$app->request->isPost) {
    //          $model->eventImage = UploadedFile::getInstance($model, 'eventImage');
    //          if ($model->upload()) {
    //              return $this->redirect(['view', 'id' => $model->id]);
    //          }
    //      }
    //      return $this->render('upload', ['model' => $model]);
    // }


}