<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'passchange',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,),
     //'htmlOptions'=>array('enctype'=>'multipart/form-data'),

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'activationcode'); ?>
		<?php echo $form->textField($model,'activationcode',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'activationcode'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>

	
	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
