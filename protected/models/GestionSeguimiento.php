<?php

/**
 * This is the model class for table "gestion_seguimiento".
 *
 * The followings are the available columns in table 'gestion_seguimiento':
 * @property integer $id_gestion_seguimiento
 * @property integer $id_gestion
 * @property string $fecha_gestion_seguimiento
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Gestion $idGestion
 */
class GestionSeguimiento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gestion_seguimiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_gestion', 'required'),
			array('id_gestion', 'numerical', 'integerOnly'=>true),
			array('fecha_gestion_seguimiento, observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_gestion_seguimiento, id_gestion, fecha_gestion_seguimiento, observaciones', 'safe', 'on'=>'search'),
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
			'idGestion' => array(self::BELONGS_TO, 'Gestion', 'id_gestion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gestion_seguimiento' => 'Id Gestion Seguimiento',
			'id_gestion' => 'Id Gestion',
			'fecha_gestion_seguimiento' => 'Fecha Gestion Seguimiento',
			'observaciones' => 'Observaciones',
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

		$criteria->compare('id_gestion_seguimiento',$this->id_gestion_seguimiento);
		$criteria->compare('id_gestion',$this->id_gestion);
		$criteria->compare('fecha_gestion_seguimiento',$this->fecha_gestion_seguimiento,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GestionSeguimiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
