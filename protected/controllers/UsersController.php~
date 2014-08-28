<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','create','forgotPassword','resetpassword'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changePassword','profile'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionForgotPassword()
	{

		//$model=new Users;
		$model=new PasswordReset;
		$model1=new LoginForm;
        
        if(isset($_POST['PasswordReset']))
		{
			echo $email=$_POST['PasswordReset']['email'];
			//$username=$_POST['PasswordReset']['username'];
			$aid=self::activationKeyGenerate();
                        echo $pass=self::passwordGenerate();
			$emailTemplate=EmailTemplate::model()->findByAttributes(array('email_template_key' => EmailTemplate::PASSWORD_RECOVERY,));
			$user_model=Users::model()->findByAttributes(array('email'=>$email));
                        if($user_model==null)
			{
				       Yii::app()->user->setFlash('forgot_pass_fail','No users found for this email.');
						$this->render("forgotpassword",array("model" => $model));
						exit;
			}
			else
			{
	           
                      Yii::import('application.extensions.phpmailer.JPhpMailer');
						$mail = new JPhpMailer;
						$m='c';
						$aid.='C';
						 $mail->Subject = $emailTemplate->email_template_subject;
						 //$user_model->activation_key=$aid;
                                                 $user_model->password=$pass;
						 $user_model->save();
						 //$link = $this->createAbsoluteUrl('/users/resetpassword', array('acode' => $aid ,'user' => $username ));
                                                 $link = $this->createAbsoluteUrl('/site/login', array('acode' => $aid ,'user' => $user_model->username ));
						  //-----------
						 /*$mail->IsSMTP();
                         $mail->IsHTML(true);
                         //$mail->SMTPAuth = true;
                         $mail->SMTPSecure = "ssl";
                         $mail->Host = "smtp.gmail.com";
                         $mail->Port = 465;
                         $mail->CharSet = 'UTF-8';
                         $mail->Username = "abc@support.com";
                         $mail->Password = "abc";
                         $mail->From = "xyz@support.com";
                         $mail->FromName = "support.com";
                         $mail->IsHTML(true);*/
                        
						 //------------
						  $mail->Subject = $emailTemplate->email_template_subject;
						 $ls_emailBody = $this->makeForgotPasswordEmailBody($user_model,$link,$m,$pass);
						 $mail->AltBody = $ls_emailBody;
                                                 $mail->AddAddress($user_model->email, $user_model->username);
						  //$mail->AddAddress($email, $user_model->username);
						   $mail->SetFrom('contact@fakefreindfinder.com', 'GMail');
						 $mail->MsgHTML($ls_emailBody);
						print_r($ls_emailBody);
						$mail->Send();
											
						//Yii::app()->user->setFlash('forgot_pass_success','Please check your mail for the reset password link.');
						//$this->refresh();
						
						
	          //Yii::app()->user->setFlash('forgot_pass_success','Please check your mail for the reset password link.');
                  Yii::app()->user->setFlash('forgot_pass_success','Please check your mail for the retrieve your password .');
	          $this->render('forgotpassword',array('model'=>$model));
	          exit; 
			}
         }

		$this->render('forgotpassword',array(
			'model'=>$model,
		));
	}

    public function makeForgotPasswordEmailBody($user_model,$url,$v,$pass)
	{
		$lo_emailTemplate = EmailTemplate::model()->findByAttributes(array(
		'email_template_key' => EmailTemplate::PASSWORD_RECOVERY,
		));
		$ls_bodyContent = $lo_emailTemplate->email_template_body;
		$ls_bodyContent = str_replace('[%USER%]', $user_model->username, $ls_bodyContent);
		$ls_bodyContent = str_replace('[%USERNAME%]', $user_model->username, $ls_bodyContent);
		$ls_bodyContent = str_replace('[%LINK%]', $url, $ls_bodyContent);
                $ls_bodyContent = str_replace('[%PASSWORD%]', $pass, $ls_bodyContent);
		return $ls_bodyContent;
	}

	public function activationKeyGenerate() {
		$chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$length=strlen($chars);
		$activationkey = "";
		while ($i <= 8) {
			$i++;
			$activationkey.= $chars{mt_rand(0,$length-1)};
		}
		//echo"sss";
		return($activationkey);
	}
        
        public function passwordGenerate() {
		$chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$length=strlen($chars);
		$activationpass = "";
		while ($i <= 5) {
			$i++;
			$activationpass.= $chars{mt_rand(0,$length-1)};
		}
		//echo"sss";
		return($activationpass);
	}
	public function actionchangePassword($id)
	{

		$model=new PassChange;
		//$model=new Users;
		
		if(isset($_POST['PassChange']))
		{
                        $pass=md5($_POST['PassChange']['currentPassword']);
                        $user_model=Users::model()->findByAttributes(array('id'=>$id,'password'=>$pass));
                       if($user_model==null)
			    {
				       Yii::app()->user->setFlash('change_pass_fail','No users found.');
						$this->render("changepassword",array("model" => $model));
						exit;
			    }
                        else
                        {
                        $user_model->attributes=$_POST['PassChange'];
			$user_model->password=md5($_POST['PassChange']['password']);
			$user_model->save();
			$this->redirect(array('view','id'=>$user_model->id));
                        }
		}
		$this->render('changepassword',array(
			'model'=>$model,
		));

	}
    
         public function actionResetpassword()
	{
              $model=new PasswordReset;
              if(isset($_POST['PasswordReset']))
		     {
               $acode=$_POST['PasswordReset']['activationcode'];
			   $password=md5($_POST['PasswordReset']['password']);
			   $user_model=Users::model()->findByAttributes(array('activation_key'=>$acode));
			   if($user_model==null)
			    {
				       Yii::app()->user->setFlash('forgot_pass_fail','No users found.');
						$this->render("forgotpassword",array("model" => $model));
						exit;
			    }
			    else
			    {
                                 $user_model->attributes=$_POST['PasswordReset'];
			    	 //$user_model->password=$password;
			    	 $user_model->update();
			    	 $this->redirect(array('/site/login'));
			    }
		     }
              $this->render('/users/resetpassword',array(
			'model'=>$model,
		));
        }
         
            public function actionProfile($name)
        {
        	$user_model=Users::model()->findByAttributes(array('username'=>$name));
        	//echo $user_model->id;
            $this->redirect(array('view','id'=>$user_model->id));
           
        }
        

}
