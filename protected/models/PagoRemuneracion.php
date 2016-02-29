<?php

/**
 * This is the model class for table "pago_remuneracion".
 *
 * The followings are the available columns in table 'pago_remuneracion':
 * @property integer $id_pago_remuneracion
 * @property string $porcentaje
 * @property string $dinero
 * @property string $bono
 *
 * The followings are the available model relations:
 * @property CalculoRemuneracion[] $calculoRemuneracions
 */
class PagoRemuneracion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pago_remuneracion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('porcentaje, dinero', 'required'),
			array('bono', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pago_remuneracion, porcentaje, dinero, bono', 'safe', 'on'=>'search'),
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
			'calculoRemuneracions' => array(self::HAS_MANY, 'CalculoRemuneracion', 'id_pago_remuneracion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pago_remuneracion' => 'Id Pago Remuneracion',
			'porcentaje' => 'Porcentaje',
			'dinero' => 'Dinero',
			'bono' => 'Bono',
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

		$criteria->compare('id_pago_remuneracion',$this->id_pago_remuneracion);
		$criteria->compare('porcentaje',$this->porcentaje,true);
		$criteria->compare('dinero',$this->dinero,true);
		$criteria->compare('bono',$this->bono,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PagoRemuneracion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
