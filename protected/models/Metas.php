<?php

/**
 * This is the model class for table "metas".
 *
 * The followings are the available columns in table 'metas':
 * @property integer $id_meta
 * @property string $monto
 * @property string $porcentaje_meta
 * @property string $monto_mes_proyecto
 * @property integer $id_usuario
 * @property string $id_crm_proyecto
 * @property integer $mes
 * @property integer $id_tipo_meta
 * @property integer $remuneracion
 *
 * The followings are the available model relations:
 * @property Usuarios $idUsuario
 * @property Proyecto $idCrmProyecto
 * @property TipoMeta $idTipoMeta
 * @property Meses $mes0
 */
class Metas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'metas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('monto, porcentaje_meta, monto_mes_proyecto,id_tipo_meta', 'required'),
			array('id_usuario, id_tipo_meta, mes, remuneracion', 'numerical', 'integerOnly'=>true),
			array('id_crm_proyecto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_meta, monto, porcentaje_meta, monto_mes_proyecto, id_usuario, id_crm_proyecto, mes, id_tipo_meta, remuneracion', 'safe', 'on'=>'search'),
			array('id_crm_proyecto','UniqueAttributesValidator','with'=>'mes,id_tipo_meta' ,'message'=>'La meta existe.'),
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
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'idCrmProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_crm_proyecto'),
			'idTipoMeta' => array(self::BELONGS_TO, 'TipoMeta', 'id_tipo_meta'),
			'mes0' => array(self::BELONGS_TO, 'Meses', 'mes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		    'id_meta' => 'Id Meta',
			'monto' => 'Monto Cartera',
			'porcentaje_meta' => 'Porcentaje Meta',
			'monto_mes_proyecto' => 'Monto Meta',
			'id_usuario' => 'Usuario',
			'id_crm_proyecto' => 'ID Proyecto',
			'mes' => 'Mes',
			'id_tipo_meta' => 'Tipo Meta',
			'remuneracion' => 'Remuneracion',
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

		$criteria->compare('id_meta',$this->id_meta);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('porcentaje_meta',$this->porcentaje_meta,true);
		$criteria->compare('monto_mes_proyecto',$this->monto_mes_proyecto,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('id_tipo_meta',$this->id_tipo_meta);
		$criteria->compare('remuneracion',$this->remuneracion);
        $criteria->order = 'id_meta desc';
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
             public function projectcobrador()
	{
                $criteria = new CDbCriteria();        

		// @todo Please modify the following code to remove attributes that should not be searched.
                $mes_actual= date("n");

		$criteria=new CDbCriteria;
                $criteria->select = 'id_usuario,mes';
                $criteria->distinct = true;
                $criteria->compare('id_usuario',$this->id_usuario);
                $criteria->addCondition("remuneracion = 0");
                $criteria->addCondition("id_tipo_meta = 2");
                $criteria->addCondition("mes = $mes_actual ");
                $criteria->compare('mes',$this->mes);
		$criteria->compare('id_meta',$this->id_meta);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('porcentaje_meta',$this->porcentaje_meta,true);
		$criteria->compare('monto_mes_proyecto',$this->monto_mes_proyecto,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('id_tipo_meta',$this->id_tipo_meta);
                $criteria->order = 'id_usuario desc';

		return new CActiveDataProvider($this, array(                   
			'criteria'=>$criteria,
		));
	}
        
        public function remuneracionproject()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->addCondition("id_usuario IS NOT NULL");        
                $criteria->addCondition("remuneracion = 0");
		$criteria->compare('id_meta',$this->id_meta);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('porcentaje_meta',$this->porcentaje_meta,true);
		$criteria->compare('monto_mes_proyecto',$this->monto_mes_proyecto,true);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('id_tipo_meta',$this->id_tipo_meta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Metas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
