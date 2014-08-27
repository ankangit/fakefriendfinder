<?php

$this->pageTitle=Yii::app()->name . ' - Forgot Password';
$this->breadcrumbs=array(
	'Forgot Password',
);

?>

<h1>Forgot Password</h1>


    
    
    
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'passchange',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,),
     //'htmlOptions'=>array('enctype'=>'multipart/form-data'),

)); ?>
    <?php $forpasssuccess=Yii::app()->user->getFlash('forgot_pass_success');
if($forpasssuccess){
    echo "<div class='flash-success'>";
    echo $forpasssuccess;
    echo "</div>";
}
$forpassfail=Yii::app()->user->getFlash('forgot_pass_fail');
if($forpassfail){
    echo "<div class='flash-error'>";
    echo $forpassfail;
    echo "</div>";
} 

?>  
        <p class="note">Fields with <span class="required">*</span> are required.</p>
    
        <?php echo $form->errorSummary($model); ?>
    
        <div class="row">
            <?php //echo $form->labelEx($model,'username'); ?>
            <?php //echo $form->textField($model,'username'); ?>
            <?php //echo $form->error($model,'username'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo $form->textField($model,'email'); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
        
        <div class="row">
            <?php echo CHtml::submitButton('Submit'); ?>
            <div class="spacer"></div>
        </div>
    
    	<?php $this->endWidget(); ?>
    
    <!-- form -->


<?php //endif; ?>
