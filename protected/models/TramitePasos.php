<?php

/**
 * This is the model class for table "tramite_pasos".
 *
 * The followings are the available columns in table 'tramite_pasos':
 * @property integer $id_tramite_pasos
 * @property integer $id_tramite
 * @property integer $id_cliente_gs
 * @property string $fecha_pazysalvo
 * @property integer $id_expediente_fisico
 * @property integer $id_usuario
 * @property string $fecha_inicio
 * @property integer $id_razones_estado
 * @property integer $id_estado
 * @property integer $id_paso
 * @property string $fecha_paso
 * @property integer $id_banco
 * @property integer $id_responsable_ejecucion
 * @property integer $id_tipo_responsable
 * @property string $firma_cliente
 * @property string $firma_promotora
 * @property string $fecha_solicitud
 * @property string $fecha_recibido
 * @property string $id_crm_proyecto
 * @property string $fecha_actualizacion
 *
 * The followings are the available model relations:
 * @property Estado $idEstado
 * @property Paso $idPaso
 * @property RazonesEstado $idRazonesEstado
 * @property ResponsableEjecucion $idResponsableEjecucion
 * @property TipoResponsable $idTipoResponsable
 * @property Cliente $idClienteGs
 * @property Tramite $idTramite
 * @property ExpedienteFisico $idExpedienteFisico
 * @property Proyecto $idCrmProyecto
 */
class TramitePasos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tramite_pasos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */

	public $fecha_paso_range_pasos = '';

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tramite, id_cliente_gs, id_usuario, id_expediente_fisico, id_usuario, id_razones_estado, id_estado, id_paso, id_banco, id_responsable_ejecucion, id_tipo_responsable', 'numerical', 'integerOnly'=>true),
			array('fecha_actualizacion, fecha_pazysalvo, fecha_inicio, fecha_paso_range_pasos, firma_cliente, firma_promotora, fecha_solicitud, fecha_recibido, id_crm_proyecto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fecha_actualizacion, id_tramite_pasos, id_tramite, id_cliente_gs, fecha_pazysalvo, id_expediente_fisico, id_usuario, fecha_inicio, id_razones_estado, id_estado, id_paso, fecha_paso, fecha_paso_range_pasos, id_banco, id_responsable_ejecucion, id_tipo_responsable, firma_cliente, firma_promotora, fecha_solicitud, fecha_recibido, id_crm_proyecto', 'safe', 'on'=>'search'),
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
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idPaso' => array(self::BELONGS_TO, 'Paso', 'id_paso'),
			'idRazonesEstado' => array(self::BELONGS_TO, 'RazonesEstado', 'id_razones_estado'),
			'idResponsableEjecucion' => array(self::BELONGS_TO, 'ResponsableEjecucion', 'id_responsable_ejecucion'),
			'idTipoResponsable' => array(self::BELONGS_TO, 'TipoResponsable', 'id_tipo_responsable'),
			'idClienteGs' => array(self::BELONGS_TO, 'Cliente', 'id_cliente_gs'),
			'idTramite' => array(self::BELONGS_TO, 'Tramite', 'id_tramite'),
			'idExpedienteFisico' => array(self::BELONGS_TO, 'ExpedienteFisico', 'id_expediente_fisico'),
			'idUsuario' => array(self::BELONGS_TO, 'Usuarios', 'id_usuario'),
			'idCrmProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_crm_proyecto'),
			'idBanco' => array(self::BELONGS_TO, 'Banco', 'id_banco'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tramite_pasos' => 'Id Tramite Pasos',
			'id_tramite' => 'Id Tramite',
			'id_cliente_gs' => 'Id Cliente Gs',
			'fecha_pazysalvo' => 'Fecha Pazysalvo',
			'id_expediente_fisico' => 'Id Expediente Fisico',
			'id_usuario' => 'Id Usuario',
			'fecha_inicio' => 'Fecha Inicio',
			'id_razones_estado' => 'Id Razones Estado',
			'id_estado' => 'Estado',
			'id_paso' => 'Id Paso',
			'fecha_paso' => 'Fecha Paso',
			'id_banco' => 'Id Banco',
			'id_responsable_ejecucion' => 'Id Responsable Ejecucion',
			'id_tipo_responsable' => 'Id Tipo Responsable',
			'firma_cliente' => 'Firma Cliente',
			'firma_promotora' => 'Firma Promotora',
			'fecha_solicitud' => 'Fecha Solicitud',
			'fecha_recibido' => 'Fecha Recibido',
			'id_crm_proyecto' => 'Proyecto',
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
 	public static function parseDateRange($value, $createTime = false)
    {
        if (preg_match("/(\d{4}-\d{2}-\d{2})\s*-\s*(\d{4}-\d{2}-\d{2})/", $value, $match)) {
            if ($createTime) {
                return array(strtotime($match[1] . ' 00:00:00'), strtotime($match[2] . ' 23:59:59'));
            } else {
                return array($match[1], $match[2]);
            }
        }
        return false;
    }	

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_tramite_pasos',$this->id_tramite_pasos);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		//$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_paso',$this->id_paso);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_banco',$this->id_banco);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('id_tipo_responsable',$this->id_tipo_responsable);
		$criteria->compare('firma_cliente',$this->firma_cliente,true);
		$criteria->compare('firma_promotora',$this->firma_promotora,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('fecha_recibido',$this->fecha_recibido,true);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);

  		$dateRange = self::parseDateRange($this->fecha_paso_range_pasos, true);
   
        if ($dateRange) {
            list($startDate, $endDate) = $dateRange;
            print_r(date('Y-m-d', $endDate));
        	
			$criteria->addBetweenCondition('fecha_inicio', date('Y-m-d', $startDate), date('Y-m-d', $endDate));        
        } else {
        	die;
        }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function tramitesanteriores($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
               
		$criteria=new CDbCriteria;
        $criteria->compare('id_tramite',$id);
        $criteria->condition = 'id_cliente_gs >=1507';
		$criteria->compare('id_tramite_pasos',$this->id_tramite_pasos);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		//$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_paso',$this->id_paso);
	//	$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_banco',$this->id_banco);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('id_tipo_responsable',$this->id_tipo_responsable);
		$criteria->compare('firma_cliente',$this->firma_cliente,true);
		$criteria->compare('firma_promotora',$this->firma_promotora,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('fecha_recibido',$this->fecha_recibido,true);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function tramitesliquidados($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
               
		$criteria=new CDbCriteria;
            //    $criteria->compare('id_tramite',$id);
		$criteria->condition = 'id_cliente_gs >=1507';
        $criteria->condition = 'id_tramite = ."'.$id.'" ';
		$criteria->compare('id_tramite_pasos',$this->id_tramite_pasos);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_paso',$this->id_paso);
		$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_banco',$this->id_banco);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('id_tipo_responsable',$this->id_tipo_responsable);
		$criteria->compare('firma_cliente',$this->firma_cliente,true);
		$criteria->compare('firma_promotora',$this->firma_promotora,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('fecha_recibido',$this->fecha_recibido,true);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function reporteexcel()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
	//	$criteria->with = array('tramite');
        $criteria->condition = 'id_cliente_gs >=1507 and id_expediente_fisico=3 and id_paso!=11';
		$criteria->compare('id_tramite_pasos',$this->id_tramite_pasos);
		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('fecha_pazysalvo',$this->fecha_pazysalvo,true);
		$criteria->compare('id_expediente_fisico',$this->id_expediente_fisico);
		$criteria->compare('id_usuario',$this->id_usuario);
	//	$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('id_razones_estado',$this->id_razones_estado);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_paso',$this->id_paso);
		//$criteria->compare('fecha_paso',$this->fecha_paso,true);
		$criteria->compare('id_banco',$this->id_banco);
		$criteria->compare('id_responsable_ejecucion',$this->id_responsable_ejecucion);
		$criteria->compare('id_tipo_responsable',$this->id_tipo_responsable);
		$criteria->compare('firma_cliente',$this->firma_cliente,true);
		$criteria->compare('firma_promotora',$this->firma_promotora,true);
		$criteria->compare('fecha_solicitud',$this->fecha_solicitud,true);
		$criteria->compare('fecha_recibido',$this->fecha_recibido,true);
		$criteria->compare('id_crm_proyecto',$this->id_crm_proyecto,true);

		$dateRange = self::parseDateRange($this->fecha_paso_range_pasos, true);
  
        if ($dateRange) {
            list($startDate, $endDate) = $dateRange;
           
			$criteria->addBetweenCondition('fecha_inicio', date('Y-m-d', $startDate), date('Y-m-d', $endDate));        
        } 
        
   		$data = new CActiveDataProvider(get_class($this), array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' =>10000),

                'totalItemCount'=>'5000',   ));
        $_SESSION['TramitePasos']=$data; // get all data and filtered data :)

    
        return $data;

    

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TramitePasos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
