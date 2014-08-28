<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '169599634635', // replace your app id here
	channelUrl : 'http://stagingpc.com/fakefriendfinder', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			window.location.href = "<?php echo Yii::app()->request->baseUrl?>index.php/users/fblogin";
		}
	}, {scope: 'email,user_likes'});
}
</script>
<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
        <div class="login_btn_section">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
            <div class="login_with_fb" ><img src="<?php echo Yii::app()->request->baseUrl?>/themes/fakefriendfinder/img/facebook-connect.png" onclick="FBLogin();"></div>    
        </div>
     
     <p>&nbsp;</p>
    <p style="text-align:left;">
        <?php echo  CHtml::link('Forgot your password?' , array('users/forgotPassword') , array());?><br />
     </p>
<?php $this->endWidget(); ?>
</div><!-- form -->
