<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property integer $active
 */
class Users extends CActiveRecord
{
	
	public $confirmPassword;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dob, gender, email, address, phone, active', 'required'),
                        array('username, password', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>255),
			array('gender', 'length', 'max'=>1),
			array('email', 'length', 'max'=>100),
			//array('dob', 'date', 'format'=>'dd-M-yyyy'),
			//array('dob', 'type', 'type' => 'date', 'dateFormat' => 'yyyy-dd-MM'),
			//array('dob', 'type', 'type' => 'date', 'message' => '{attribute}: is not a date!', 'dateFormat' => 'yyyy-MM-dd'),
			array('email', 'email'),
			array('dob','safe'),
			array('username, email', 'unique'),
			array('phone', 'length', 'max'=>20),
			array('username', 'length', 'max'=>25),
			array('password', 'length', 'max'=>32),
			array('username, password, confirmPassword', 'required', 'on'=>'create'),
			//array('password, confirmPassword', 'required', 'on'=>'create'),
			// compare password to repeated password
            array('password', 'compare', 'compareAttribute'=>'confirmPassword','on'=>'create'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, dob, gender, email, address, phone, username, active', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'dob' => 'Birth date',
			'gender' => 'Gender',
			'email' => 'Email',
			'address' => 'Address',
			'phone' => 'Phone',
			'username' => 'Username',
			'password' => 'Password',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
    	
        $pass = md5($this->password);
    	$this->password = $pass;
    	return true;
    }

    public function beforeValidate(){

    	$this->active 	= 1;
    	return parent::beforeValidate();
    }
}
