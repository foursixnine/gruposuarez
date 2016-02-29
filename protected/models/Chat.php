<?php

/**
 * This is the model class for table "chat".
 *
 * The followings are the available columns in table 'chat':
 * @property integer $id_chat
 * @property string $descripcion
 * @property integer $id_tramite
 * @property string $archivo
 * @property string $imagen
 *
 * The followings are the available model relations:
 * @property Tramite $idTramite
 */
class Chat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tramite', 'numerical', 'integerOnly'=>true),
			array('descripcion, archivo, imagen', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_chat, descripcion, id_tramite, archivo, imagen', 'safe', 'on'=>'search'),
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
			'idTramite' => array(self::BELONGS_TO, 'Tramite', 'id_tramite'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_chat' => 'Id Chat',
			'descripcion' => 'Comentario',
			'id_tramite' => 'Id Tramite',
			'archivo' => 'Archivo',
			'imagen' => 'Imagen',
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

		$criteria->compare('id_chat',$this->id_chat);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('archivo',$this->archivo,true);
		$criteria->compare('imagen',$this->imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function tramites($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
 $criteria->compare('id_tramite',$id);
		$criteria->compare('id_chat',$this->id_chat);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('archivo',$this->archivo,true);
		$criteria->compare('imagen',$this->imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Chat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
