<?php
/* @var $this EmailTemplateController */
/* @var $data EmailTemplate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template_subject')); ?>:</b>
	<?php echo CHtml::encode($data->email_template_subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template_body')); ?>:</b>
	<?php echo CHtml::encode($data->email_template_body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template_key')); ?>:</b>
	<?php echo CHtml::encode($data->email_template_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template_create_date')); ?>:</b>
	<?php echo CHtml::encode($data->email_template_create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template_is_active')); ?>:</b>
	<?php echo CHtml::encode($data->email_template_is_active); ?>
	<br />

</div>