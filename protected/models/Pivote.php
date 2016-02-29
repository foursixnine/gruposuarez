<?php

/**
 * This is the model class for table "pivote".
 *
 * The followings are the available columns in table 'pivote':
 * @property integer $id_calculo_vencidad
 * @property string $monto
 * @property string $treinta
 * @property string $sesenta
 * @property string $noventa
 * @property string $cientoveinte
 * @property string $id_crm_proyecto
 * @property integer $mes
 */
class Pivote extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pivote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mes', 'numerical', 'integerOnly'=>true),
			array('monto, treinta, sesenta, noventa, cientoveinte, id_crm_proyecto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_calculo_vencidad, monto, treinta, sesenta, noventa, cientoveinte, id_crm_proyecto, mes', 'safe', 'on'=>'search'),
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
			'id_calculo_vencidad' => 'Id Calculo Vencidad',
			'monto' => 'Monto',
			'treinta' => 'Treinta',
			'sesenta' => 'Sesenta',
			'noventa' => 'Noventa',
			'cientoveinte' => 'Cientoveinte',
			'id_crm_proyecto' => 'Id Crm Proyecto',
			'mes' => 'Mes',
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

		$criteria->compare('id_calculo_vencidad',$this->id_calculo_vencidad);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('treinta',$this->treinta,true);
		$criteria->compare('sesenta',$this->sesenta,true);
		$criteria->compare('noventa',$this->noventa,true);
		$criteria->compare('cientoveinte',$this->cientoveinte,true);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);
		$criteria->compare('mes',$this->mes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pivote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
