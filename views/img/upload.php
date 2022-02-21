<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="upload-form mt-5 pt-5">

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	<?= $form->field($model, 'name') ?>

	<?= $form->field($model, 'eventImage')->fileInput() ?>

	<?php $form = ActiveForm::begin(); ?>


	
	<div class="form-group">
		<?= Html::submitButton('upload', ['class' => 'btn btn-primary']) ?>
	</div>
</div>