<?php

/**
 * This is the model class for table "paso".
 *
 * The followings are the available columns in table 'paso':
 * @property integer $id_paso
 * @property string $descripcion 
 * @property string $abrev
 * 
 * The followings are the available model relations:
 * @property TramitePasos[] $tramitePasoses
 * @property TramiteActividad[] $tramiteActividads
 * @property DuracionPasos[] $duracionPasoses
 * @property Tramite[] $tramites
 */
class Paso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_paso, descripcion, abrev', 'safe', 'on'=>'search'),
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
			'tramitePasoses' => array(self::HAS_MANY, 'TramitePasos', 'id_paso'),
			'tramiteActividads' => array(self::HAS_MANY, 'TramiteActividad', 'id_paso'),
			'duracionPasoses' => array(self::HAS_MANY, 'DuracionPasos', 'id_paso'),
			'tramites' => array(self::HAS_MANY, 'Tramite', 'id_pasos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_paso' => 'Id Paso',
			'descripcion' => 'Nombre Paso',
                        'abrev' => 'Paso',
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

		$criteria->compare('id_paso',$this->id_paso);
		$criteria->compare('descripcion',$this->descripcion,true);
                $criteria->compare('abrev',$this->abrev,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
