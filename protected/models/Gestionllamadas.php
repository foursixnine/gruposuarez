<?php

/**
 * This is the model class for table "gestionllamadas".
 *
 * The followings are the available columns in table 'gestionllamadas':
 * @property integer $id_gestion_llamadas
 * @property string $descripcion
 * @property integer $id_tipo_gestion
 *
 * The followings are the available model relations:
 * @property Tipogestion $idTipoGestion
 * @property Gestion[] $gestions
 */
class Gestionllamadas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gestionllamadas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, id_tipo_gestion', 'required'),
			array('id_tipo_gestion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_gestion_llamadas, descripcion, id_tipo_gestion', 'safe', 'on'=>'search'),
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
			'idTipoGestion' => array(self::BELONGS_TO, 'Tipogestion', 'id_tipo_gestion'),
			'gestions' => array(self::HAS_MANY, 'Gestion', 'id_gestion_llamadas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gestion_llamadas' => 'Id Gestion Llamadas',
			'descripcion' => 'Descripcion',
			'id_tipo_gestion' => 'Id Tipo Gestion',
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

		$criteria->compare('id_gestion_llamadas',$this->id_gestion_llamadas);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_tipo_gestion',$this->id_tipo_gestion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gestionllamadas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
