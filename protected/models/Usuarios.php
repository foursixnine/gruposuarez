<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property integer $cedula
 * @property integer $id_rol
 * @property string $username
 * @property string $password
 * @property string $session
 *
 * The followings are the available model relations:
 * @property Gestion[] $gestions
 * @property Roles $idRol
 * @property Metas[] $metases
 * @property CalculoRemuneracion[] $calculoRemuneracions
 * @property Tableros[] $tableroses
 * @property Tramite[] $tramites
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula, id_rol', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>255),
			array('nombre, apellido, session', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, nombre, apellido, cedula, id_rol, username, password, session', 'safe', 'on'=>'search'),
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
			'gestions' => array(self::HAS_MANY, 'Gestion', 'id_usuario'),
			'idRol' => array(self::BELONGS_TO, 'Roles', 'id_rol'),
			'metases' => array(self::HAS_MANY, 'Metas', 'id_usuario'),
			'calculoRemuneracions' => array(self::HAS_MANY, 'CalculoRemuneracion', 'id_usuario'),
			'tableroses' => array(self::HAS_MANY, 'Tableros', 'id_usuario'),
			'tramites' => array(self::HAS_MANY, 'Tramite', 'id_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre Usuario',
			'apellido' => 'Apellido Usuario',
			'cedula' => 'Cedula',
			'id_rol' => 'Id Rol',
			'username' => 'Usuario',
			'password' => 'Password',
			'session' => 'Session',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('id_rol',$this->id_rol);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('session',$this->session,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->session)==$this->password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		//return md5($salt.$password);
		return $password;
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	public function generateSalt()
	{
		return uniqid('',true);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
