<?php

/**
 * This is the model class for table "gestion".
 *
 * The followings are the available columns in table 'gestion':
 * @property integer $id_gestion
 * @property integer $id_cliente
 * @property integer $contactado_llamada
 * @property integer $llamada_voz
 * @property integer $id_acuerdo_cobros
 * @property string $fecha_acuerdo
 * @property integer $id_gestion_llamadas
 * @property string $observaciones
 * @property integer $id_cumplimiento
 * The followings are the available model relations:
 * @property AcuerdoCobros $idAcuerdoCobros
 * @property Clientes $idCliente
 * @property Gestionllamadas $idGestionLlamadas
 */
class Gestion extends CActiveRecord
{
     
	/**
	 * @return string the associated database table name
         * 
	 */
	public function tableName()
	{
		return 'gestion';
	}
     
	/**
	 * @return array validation rules for model attributes.
	 */
        public $clinom;
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cliente, contactado_llamada, llamada_voz, id_acuerdo_cobros, id_gestion_llamadas', 'numerical', 'integerOnly'=>true),
			array('fecha_acuerdo, observaciones', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_gestion,clinom, id_cliente, contactado_llamada, llamada_voz, id_acuerdo_cobros, fecha_acuerdo, id_gestion_llamadas, observaciones, id_cumplimiento','safe', 'on'=>'search'),
                    
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
			'idAcuerdoCobros' => array(self::BELONGS_TO, 'AcuerdoCobros', 'id_acuerdo_cobros'),
			'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'idGestionLlamadas' => array(self::BELONGS_TO, 'Gestionllamadas', 'id_gestion_llamadas'),
                        'idCumplimiento' => array(self::BELONGS_TO, 'CumplimientoGestion', 'id_cumplimiento'),	
                );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gestion' => 'Id Gestion',
			'id_cliente' => 'Id Cliente',
			'contactado_llamada' => 'Lista desplegable de si o no.',
			'llamada_voz' => 'Gestione si o no',
			'id_acuerdo_cobros' => 'Id Acuerdo Cobros',
			'fecha_acuerdo' => 'Fecha Acuerdo',
			'id_gestion_llamadas' => 'Id Gestion Llamadas',
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

		$criteria->compare('id_gestion',$this->id_gestion);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('contactado_llamada',$this->contactado_llamada);
		$criteria->compare('llamada_voz',$this->llamada_voz);
		$criteria->compare('id_acuerdo_cobros',$this->id_acuerdo_cobros);
		$criteria->compare('fecha_acuerdo',$this->fecha_acuerdo,true);
		$criteria->compare('id_gestion_llamadas',$this->id_gestion_llamadas);
		$criteria->compare('observaciones',$this->observaciones,true);
                $criteria->compare('id_cumplimiento',$this->id_cumplimiento);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
            /** 
     * AGENDA GESTI�N - BUSQUEDA LOS PRIMEROS 5
    **/

    public function agendagestion()
    {
        
        $criteria = new CDbCriteria;
     
        $criteria->compare('id_gestion',$this->id_gestion);
        $criteria->compare('id_cliente',$this->id_cliente);
$criteria->compare('id_gestion_llamadas',$this->id_gestion_llamadas);
$criteria->compare('fecha_acuerdo',$this->fecha_acuerdo);
$criteria->compare('id_acuerdo_cobros',$this->id_acuerdo_cobros);
   //$criteria->compare('idCliente.nom_cliente', $this->clinom);
   
   //$criteria->order = 'fecha_acuerdo DESC';
  // $criteria->compare('id_cumplimiento',$this->id_cumplimiento);
   //var_dump( $criteria->compare('idCliente.nom_cliente', $this->clinom, true));die;
return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
                        
                        'pagination' => array('pageSize' => 5),
));

   
               
     }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Gestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
