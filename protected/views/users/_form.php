<?php
/* @var $this UsersController */
/* @var $model Users */
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
	
     <?php
      if ($this->action->id == "create")
     { 
     	?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'username'); ?>
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
     

     <?php }

       if ($this->action->id == "update")
     { 
      ?>
      <div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->hiddenField($model,'username',array('size'=>25,'maxlength'=>25)); ?>
		<?php //echo $form->error($model,'username'); ?>
	</div>

	
	<div class="row">
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php echo $form->hiddenField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php //echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->hiddenField($model,'confirmPassword',array('size'=>32,'maxlength'=>32)); ?>
		<?php //echo $form->error($model,'confirmPassword'); ?>
	</div>

     <?php
       }
     ?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'attribute'=>'dob',
			'model'=>$model,
			 // additional javascript options for the date picker plugin
			'options'=>array(
					'dateFormat' => 'yy-mm-dd',
					//'showAnim'=>'slide',
					),
			));
	?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php //echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->dropDownList($model,'gender',array('prompt'=>'Select Account','M'=>'Male','F'=>'Female')); ?>
		
		<?php echo $form->error($model,'gender'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
