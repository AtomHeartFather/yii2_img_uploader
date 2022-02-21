<?php

namespace app\controllers;

use Yii;
use app\models\Media;
use yii\web\UploadedFile;

class MediaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload()
    {
        $model = new \app\models\Media();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $name = UploadedFile::getInstance($model, 'filename');
                $path = 'uploads/'.md5($name->baseName). '.' .$name->extension;
                if($name->saveAs($path)){
                    $model->filename = $name->baseName . '.' . $name->extension;
                    if($model->save()){
                        return $this->redirect(['index']);
                    }
                }
                return;
            }
        }

        return $this->render('upload', [
            'model' => $model,
        ]);
    }


}
