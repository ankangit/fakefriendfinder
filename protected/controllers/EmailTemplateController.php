<?php
/**
 * EmailTemplateController Class file.
 * @author Arghya Ghosh <arghya.ghosh@capitalnumbers.com>
 * @date 12/02/2013
 */

/**
 * Class EmailTemplateController extends CNController,
 * This is the Controller Class for managing "Projects".
 *
 * @author Arghya Ghosh
 * @package EmailTemplate.controllers
 * @function actionView() Displays a particular model.
 * @function actionCreate() Creates a new model.
 * @function actionUpdate() Updates a particular model.
 * @function actionDelete() Deletes a particular model.
 * @function actionIndex() Lists all models.
 * @function actionAdmin() Manages all models.
 * @function loadModel() Returns the data model based on the primary key given in the GET variable.
 * @function performAjaxValidation() Performs the AJAX validation.
 */
class EmailTemplateController extends CNController
{
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
		$model=new EmailTemplate;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmailTemplate'])) {
			
			$model->attributes = $_POST['EmailTemplate'];
			$model->email_template_create_date = date('Y-m-d');
			try {
				if($model->save()) {
					$this->redirect(array('admin'));
				} else {
					print_r($model->getError());exit;
				}	
			} catch (Exception $e) {
            	echo $e->getMessage();exit;
            }
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

		if(isset($_POST['EmailTemplate'])) {
			$model->attributes=$_POST['EmailTemplate'];
			try {
				if($model->save()) {
					$this->redirect(array('admin'));
				} else {
					print_r($model->getError());exit;
				}
			} catch (Exception $e) {
				echo $e->getMessage();exit;
			}
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
		$dataProvider=new CActiveDataProvider('EmailTemplate');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmailTemplate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmailTemplate']))
			$model->attributes=$_GET['EmailTemplate'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EmailTemplate::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='email-template-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
