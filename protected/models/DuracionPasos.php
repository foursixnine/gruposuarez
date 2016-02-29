<?php

/**
 * This is the model class for table "duracion_pasos".
 *
 * The followings are the available columns in table 'duracion_pasos':
 * @property integer $id_duracion_paso
 * @property integer $id_paso
 * @property integer $id_tipo_paso
 * @property integer $id_banco
 * @property integer $duracion
 *
 * The followings are the available model relations:
 * @property Paso $idPaso
 * @property TipoPaso $idTipoPaso
 * @property Banco $idBanco
 */
class DuracionPasos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'duracion_pasos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_banco', 'required'),
			array('id_paso, id_tipo_paso, id_banco, duracion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_duracion_paso, id_paso, id_tipo_paso, id_banco, duracion', 'safe', 'on'=>'search'),
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
			'idPaso' => array(self::BELONGS_TO, 'Paso', 'id_paso'),
			'idTipoPaso' => array(self::BELONGS_TO, 'TipoPaso', 'id_tipo_paso'),
			'idBanco' => array(self::BELONGS_TO, 'Banco', 'id_banco'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_duracion_paso' => 'Id Duracion Paso',
			'id_paso' => 'Id Paso',
			'id_tipo_paso' => 'Tipo de Paso',
			'id_banco' => 'Banco',
			'duracion' => 'Duración Días',
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

		$criteria->compare('id_duracion_paso',$this->id_duracion_paso);
		$criteria->compare('id_paso',$this->id_paso);
		$criteria->compare('id_tipo_paso',$this->id_tipo_paso);
		$criteria->compare('id_banco',$this->id_banco);
		$criteria->compare('duracion',$this->duracion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DuracionPasos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
