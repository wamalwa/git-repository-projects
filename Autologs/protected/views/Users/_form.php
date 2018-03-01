<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'emailaddress'); ?>
		<?php echo $form->emailField($model,'emailaddress',array('size'=>50,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'emailaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>50,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userpassword'); ?>
		<?php echo $form->passwordField($model,'userpassword',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'userpassword'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<!---
<// $form->field($model, 'batch')->hiddenInput(['value' => 1])->label(false)
                ;?>

< //$form->field($model, 'file')->fileInput() ?>
-->
        <?php
//        if ($model->file_import) {
//            echo '<img src="'.\Yii::$app->urlManagerFrontend->baseUrl.'/'.$model->file_import.'" width="90px">&nbsp;&nbsp;&nbsp;';
//            echo Html::a('Delete Files', ['deleteimg', 'id'=>$model->id, 'field'=> 'file_import'], ['class'=>'btn btn-danger']).'<p>';
//        }
        ?>
<?php $this->endWidget(); ?>

</div><!-- form -->