<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index'),'visible'=>(Yii::app()->user->name=="admin")),
	//array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'visible'=>(Yii::app()->user->name=="admin")),
	array('label'=>'Manage Users', 'url'=>array('admin'),'visible'=>(Yii::app()->user->name=="admin")),
        array('label'=>'Change Password', 'url'=>array('changePassword', 'id'=>$model->id)),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'dob',
		'gender',
		'email',
		'address',
		'phone',
		'username',
		//'password',
		//'active',
	),
)); ?>
