<?php
/**
 * This is the model class for table "email_template".
 * @author Arghya Ghosh <arghya.ghosh@capitalnumbers.com>
 * @date 12/02/2013
 *
 * The followings are the available columns in table 'email_template':
 * @property integer $id
 * @property string $email_title
 * @property string $email_template_subject
 * @property string $email_template_body
 * @property string $email_template_key
 * @property string $email_template_create_date
 * @property integer $email_template_is_active
 * 
 * The followings are the methods for the model class 'EmailTemplate':
 * @function model() Returns the static model of the specified AR class.
 * @function tableName() Returns string the associated database table name
 * @function rules() validation rules for model attributes.
 * @function relations() Returns the relational rules.
 * @function attributeLabels() Returns the Attribute Labels.
 * @function search() Retrieves a list of models based on the current search/filter conditions.
 */
class EmailTemplate extends CActiveRecord
{
const CONTACT_US_FRONTEND 	= "CONTACT_US_FRONTEND";
	const NEW_USER_REGISTRATION = "NEW_USER_REGISTRATION";
	const PASSWORD_RECOVERY = "PASSWORD_RECOVERY";
	const NEWS_SUBSCRIBER ="NEWS_SUBSCRIBER";
	const ADMIN_USER_ACTIVATION ="ADMIN_USER_ACTIVATION";
	const COMPANY_ACTIVATION = "COMPANY_ACTIVATION";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmailTemplate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'email_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_title, email_template_subject, email_template_key', 'required'),
			array('email_template_is_active', 'numerical', 'integerOnly'=>true),
			array('email_title, email_template_subject, email_template_key', 'length', 'max'=>255),
			array('email_template_body, email_template_create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email_title, email_template_subject, email_template_body, email_template_key, email_template_create_date, email_template_is_active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'email_title' => 'Email Title',
			'email_template_subject' => 'Email Template Subject',
			'email_template_body' => 'Email Template Body',
			'email_template_key' => 'Email Template Key',
			'email_template_create_date' => 'Email Template Create Date',
			'email_template_is_active' => 'Is This Email Template Active?',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email_template_subject',$this->email_template_subject,true);
		$criteria->compare('email_template_body',$this->email_template_body,true);
		$criteria->compare('email_template_key',$this->email_template_key,true);
		$criteria->compare('email_template_create_date',$this->email_template_create_date,true);
		$criteria->compare('email_template_is_active',$this->email_template_is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
