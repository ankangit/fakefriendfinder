<?php
/* @var $this EmailTemplateController */
/* @var $model EmailTemplate */

$this->breadcrumbs=array(
	'Email Templates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create EmailTemplate', 'url'=>array('create')),
	array('label'=>'View EmailTemplate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'List EmailTemplate', 'url'=>array('admin')),
);
?>

<div class="inner">
    <h2>Update EmailTemplate</h2>
    <div class="content contentRightPad contentForm">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="middle" class="admin">
                    <?php 
                    	echo $this->renderPartial('_form', array(
							'model' => $model,
							'update' => true
						)); 
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
