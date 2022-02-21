<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use yii\base\Model;
use yii\web\UploadedFile;

class Img extends Model
{
    public $name;
    public $uploaded_at;
    public $eventImage;

    public function rules()
    {
        return [
            [['name'], 'string'],
            [['uploaded_at'], 'integer'],
            [['eventImage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function behaviors()
         {
             return [
                 [
                     'class' => SluggableBehavior::className(),
                     'attribute' => 'message',
                     'immutable' => true,
                     'ensureUnique'=>true,
                 ],
                 [
                     'class' => BlameableBehavior::className(),
                     'createdByAttribute' => 'uploaded_at',
                 ],
                 'timestamp' => [
                     'class' => 'yii\behaviors\TimestampBehavior',
                     'attributes' => [
                         ActiveRecord::EVENT_BEFORE_INSERT => ['uploaded_at'],
                         ActiveRecord::EVENT_BEFORE_UPDATE => ['uploaded_at'],
                     ],
                 ],
             ];
         }

    public function upload() {

        // if ($this->validate()) {
        //     $this->eventImage->saveAs('uploads/' . $this->eventImage->baseName . '.' . $this->eventImage->extension);
        //     return true;
        // } else {
        //     return false;
        // }
    //}
        if (true) {
            $path = $this->uploadPath() . $this->id . "." .$this->eventImage->extension;
            $this->eventImage->saveAs($path);
            $this->image = $this->id . "." .$this->eventImage->extension;
            $this->save();
            return true;
        } else {
            return false;
        }
    }

    public function uploadPath() {
        return 'uploads/';
        //return Url::to('@web/uploads');
    }


}