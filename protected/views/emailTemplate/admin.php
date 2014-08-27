<?php
/* @var $this EmailTemplateController */
/* @var $model EmailTemplate */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Manage EmailTemplate', 'url'=>array('admin')),
	array('label'=>'Create EmailTemplate', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('email-template-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="inner">
    <h2>Manage Email Templates</h2>
    <div class="content contentRightPad contentForm">
        <?php $this->widget('application.components.ResultBar',array('containerId' => 'status'));?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="middle" class="admin">
                    <div class="adminContent">
					
						<?php 
							$this->widget('zii.widgets.grid.CGridView', array(
								'id'=>'email-template-grid',
								'dataProvider'=>$model->search(),
								'filter'=>$model,
								'columns'=>array(
									'id',
									'email_title',
									'email_template_subject',
									'email_template_body',
									'email_template_key',
									'email_template_create_date',
									'email_template_is_active',
									array(
										'class'=>'CButtonColumn',
									),
								),
							)); 
						?>
						                    
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
