<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $id_cliente_gs
 * @property string $nombre_de_empresa
 * @property string $nombre
 * @property string $apellido
 * @property string $status
 * @property string $proyecto
 * @property string $numero_de_lote
 * @property string $id_cliente
 * @property string $id_proyecto
 * @property string $numero_celular
 * @property string $numero_casa
 * @property string $numero_adicional
 * @property string $correo
 * @property string $cedula
 * @property string $lugar_trabajo
 * @property string $ocupacion
 * @property string $sexo
 * @property string $nacionalidad
 * @property string $referencia_1
 * @property string $referencia_2
 * @property string $telefono_ref_1
 * @property string $telefono_ref_2
 * @property string $relacion_ref_1
 * @property string $relacion_ref_2
 * @property string $id_de_reason
 * @property string $vendedor
 * @property string $id_vendedor
 * @property string $banco_acreedor
 * @property integer $id_banco
 * @property string $banco_interino
 * @property string $status_de_lote
 * @property string $direccion
 * @property string $motivo_del_pago
 * @property string $forma_de_pago
 * @property string $cantidad_de_quotas
 * @property string $cantidad_de_quotas_mejoras
 * @property string $tipo_de_cliente
 * @property string $estado_civil
 * @property string $status_plan_pago
 * @property string $monto_ultimo_pago
 * @property string $cartera_corriente
 * @property string $cartera_30_dias
 * @property string $cartera_60_dias
 * @property string $cartera_90_dias
 * @property string $cartera_120_dias
 * @property string $total_vencido
 * @property string $monto_abono
 * @property double $monto_liquidacion
 * @property string $total_venta
 * @property string $monto_quota_abono
 * @property string $gasto_legal
 * @property string $total
 * @property string $monto_mejoras
 * @property string $monto_cuota_mejoras
 * @property string $fecha_de_pago_abono
 * @property string $fecha_ultimo_pago
 * @property string $fecha_de_entrega
 * @property string $fecha_de_permiso_contruccion
 * @property string $fecha_de_permiso_bomberos
 * @property string $fecha_de_permiso_ocupacion
 * @property string $fecha_de_carta_promesa
 * @property integer $gestion
 * @property integer $pazysalvo
 * @property integer $confeccion_protocolo
 * @property string $observacion_tramite
 * @property integer $id_rango
 *
 * The followings are the available model relations:
 * @property Gestion[] $gestions
 * @property Cobros[] $cobroses
 * @property Pago[] $pagos
 * @property Tramite[] $tramites
 * @property Proyecto $idProyecto
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rango,confeccion_protocolo,gestion,pazysalvo', 'numerical','integerOnly'=>true),
			array('nombre_de_empresa, nombre, apellido, status, proyecto, numero_de_lote, id_cliente, id_proyecto, numero_celular, numero_casa, numero_adicional, correo, cedula, lugar_trabajo, ocupacion, sexo, nacionalidad, referencia_1, referencia_2, telefono_ref_1, telefono_ref_2, relacion_ref_1, relacion_ref_2, id_de_reason, vendedor, id_vendedor, banco_acreedor, id_banco, banco_interino, status_de_lote, direccion, motivo_del_pago, forma_de_pago, cantidad_de_quotas, cantidad_de_quotas_mejoras, tipo_de_cliente, estado_civil, status_plan_pago, monto_ultimo_pago, cartera_corriente, cartera_30_dias, cartera_60_dias, cartera_90_dias, cartera_120_dias, total_vencido, monto_abono, total_venta, monto_quota_abono, gasto_legal, total, monto_mejoras, monto_cuota_mejoras, fecha_de_pago_abono, fecha_ultimo_pago, fecha_de_entrega, fecha_de_permiso_contruccion, fecha_de_permiso_bomberos, fecha_de_permiso_ocupacion, fecha_de_carta_promesa, observacion_tramite', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rango, id_cliente_gs, nombre_de_empresa, nombre, apellido, status, proyecto, numero_de_lote, id_cliente, id_proyecto, numero_celular, numero_casa, numero_adicional, correo, cedula, lugar_trabajo, ocupacion, sexo, nacionalidad, referencia_1, referencia_2, telefono_ref_1, telefono_ref_2, relacion_ref_1, relacion_ref_2, id_de_reason, vendedor, id_vendedor, banco_acreedor, id_banco, banco_interino, status_de_lote, direccion, motivo_del_pago, forma_de_pago, cantidad_de_quotas, cantidad_de_quotas_mejoras, tipo_de_cliente, estado_civil, status_plan_pago, monto_ultimo_pago, cartera_corriente, cartera_30_dias, cartera_60_dias, cartera_90_dias, cartera_120_dias, total_vencido, monto_abono, monto_liquidacion, total_venta, monto_quota_abono, gasto_legal, total, monto_mejoras, monto_cuota_mejoras, fecha_de_pago_abono, fecha_ultimo_pago, fecha_de_entrega, fecha_de_permiso_contruccion, fecha_de_permiso_bomberos, fecha_de_permiso_ocupacion, fecha_de_carta_promesa, observacion_tramite', 'safe', 'on'=>'search'),
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
			'gestions' => array(self::HAS_MANY, 'Gestion', 'id_cliente_gs'),
			'idRango' => array(self::BELONGS_TO, 'Rango', 'id_rango'),
			'cobroses' => array(self::HAS_MANY, 'Cobros', 'id_cliente_gs'),
			'pagos' => array(self::HAS_MANY, 'Pago', 'id_cliente_gs'),
			'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
                        'tramites' => array(self::HAS_MANY, 'Tramite', 'id_cliente_gs'),
                   // 'idGestion' => array(self::HAS_MANY, 'Gestion', 'id_cliente_gs'),
                              //   'players' => array(self::HAS_MANY, 'Players', 'playerTeam'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cliente_gs' => 'Id Cliente Gs',
			'nombre_de_empresa' => 'Nombre y Apellido',
			'nombre' => 'Nombre Cliente',
			'apellido' => 'Apellido Cliente',
			'status' => 'Status',
			'proyecto' => 'Proyecto',
			'numero_de_lote' => 'Numero De Lote',
			'id_cliente' => 'Id Cliente',
			'id_proyecto' => 'Id Proyecto',
			'numero_celular' => 'Numero Celular',
			'numero_casa' => 'Numero Casa',
			'numero_adicional' => 'Numero Adicional',
			'correo' => 'Correo',
			'cedula' => 'Cedula',
			'lugar_trabajo' => 'Lugar Trabajo',
			'ocupacion' => 'Ocupacion',
			'sexo' => 'Sexo',
			'nacionalidad' => 'Nacionalidad',
			'referencia_1' => 'Nombre Referencia 1',
			'referencia_2' => 'Nombre Referencia 2',
			'telefono_ref_1' => 'Telefono Referencia 1',
			'telefono_ref_2' => 'Telefono Referencia 2',
			'relacion_ref_1' => 'Tipo de Relación(Cliente) Referencia 1',
			'relacion_ref_2' => 'Tipo de Relación(Cliente) Referencia 2',
			'id_de_reason' => 'Id De Reason',
			'vendedor' => 'Vendedor',
			'id_vendedor' => 'Id Vendedor',
			'banco_acreedor' => 'Banco Acreedor',
			'id_banco' => 'Id Banco',
			'banco_interino' => 'Banco Interino',
			'status_de_lote' => 'Status De Lote',
			'direccion' => 'Direccion',
			'motivo_del_pago' => 'Motivo Del Pago',
			'forma_de_pago' => 'Forma De Pago',
			'cantidad_de_quotas' => 'Cantidad De Quotas',
			'cantidad_de_quotas_mejoras' => 'Cantidad De Quotas Mejoras',
			'tipo_de_cliente' => 'Tipo De Cliente',
			'estado_civil' => 'Estado Civil',
			'status_plan_pago' => 'Status Plan Pago',
			'monto_ultimo_pago' => 'Monto Ultimo Pago',
			'cartera_corriente' => 'Cartera Corriente',
			'cartera_30_dias' => 'Cartera 30 Dias',
			'cartera_60_dias' => 'Cartera 60 Dias',
			'cartera_90_dias' => 'Cartera 90 Dias',
			'cartera_120_dias' => 'Cartera 120 Dias',
			'total_vencido' => 'Total Vencido',
			'monto_abono' => 'Monto Abono',
			'monto_liquidacion' => 'Monto Liquidacion',
			'total_venta' => 'Total Venta',
			'monto_quota_abono' => 'Monto Quota Abono',
			'gasto_legal' => 'Gasto Legal',
			'total' => 'Total',
			'monto_mejoras' => 'Monto Mejoras',
			'monto_cuota_mejoras' => 'Monto Cuota Mejoras',
			'fecha_de_pago_abono' => 'Fecha De Pago Abono',
			'fecha_ultimo_pago' => 'Fecha Ultimo Pago',
			'fecha_de_entrega' => 'Fecha De Entrega',
			'fecha_de_permiso_contruccion' => 'Fecha De Permiso Contruccion',
			'fecha_de_permiso_bomberos' => 'Fecha De Permiso Bomberos',
			'fecha_de_permiso_ocupacion' => 'Fecha De Permiso Ocupacion',
			'fecha_de_carta_promesa' => 'Fecha De Carta Promesa',
			'observacion_tramite' => 'Observación',
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
        
        public function getYesNoOptions() {
                return array(
                        2 => 'No',
                        1 => 'Yes',
                );
        }
    
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
 		$criteria->condition = 'status_plan_pago  != '."'RETIRO'".' AND status_de_lote =  '."'COBRO'".' AND status_de_lote !=  '."'LIQUIDADO'".' ';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
  		$criteria->compare('upper(t.nombre_de_empresa)',strtoupper($this->nombre_de_empresa),true);		
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('numero_de_lote',$this->numero_de_lote,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);
		$criteria->compare('numero_celular',$this->numero_celular,true);
		$criteria->compare('numero_casa',$this->numero_casa,true);
		$criteria->compare('numero_adicional',$this->numero_adicional,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('lugar_trabajo',$this->lugar_trabajo,true);
		$criteria->compare('ocupacion',$this->ocupacion,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('referencia_1',$this->referencia_1,true);
		$criteria->compare('referencia_2',$this->referencia_2,true);
		$criteria->compare('telefono_ref_1',$this->telefono_ref_1,true);
		$criteria->compare('telefono_ref_2',$this->telefono_ref_2,true);
		$criteria->compare('relacion_ref_1',$this->relacion_ref_1,true);
		$criteria->compare('relacion_ref_2',$this->relacion_ref_2,true);
		$criteria->compare('id_de_reason',$this->id_de_reason,true);
		$criteria->compare('vendedor',$this->vendedor,true);
		$criteria->compare('id_vendedor',$this->id_vendedor,true);
		$criteria->compare('banco_acreedor',$this->banco_acreedor,true);
		$criteria->compare('id_banco',$this->id_banco,true);
		$criteria->compare('banco_interino',$this->banco_interino,true);
		$criteria->compare('status_de_lote',$this->status_de_lote,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('motivo_del_pago',$this->motivo_del_pago,true);
		$criteria->compare('forma_de_pago',$this->forma_de_pago,true);
		$criteria->compare('cantidad_de_quotas',$this->cantidad_de_quotas,true);
		$criteria->compare('cantidad_de_quotas_mejoras',$this->cantidad_de_quotas_mejoras,true);
		$criteria->compare('tipo_de_cliente',$this->tipo_de_cliente,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('status_plan_pago',$this->status_plan_pago,true);
		$criteria->compare('monto_ultimo_pago',$this->monto_ultimo_pago,true);
		$criteria->compare('cartera_corriente',$this->cartera_corriente,true);
		$criteria->compare('cartera_30_dias',$this->cartera_30_dias,true);
		$criteria->compare('cartera_60_dias',$this->cartera_60_dias,true);
		$criteria->compare('cartera_90_dias',$this->cartera_90_dias,true);
		$criteria->compare('cartera_120_dias',$this->cartera_120_dias,true);
		$criteria->compare('total_vencido',$this->total_vencido,true);
		$criteria->compare('monto_abono',$this->monto_abono,true);
		$criteria->compare('monto_liquidacion',$this->monto_liquidacion);
		$criteria->compare('total_venta',$this->total_venta,true);
		$criteria->compare('monto_quota_abono',$this->monto_quota_abono,true);
		$criteria->compare('gasto_legal',$this->gasto_legal,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('monto_mejoras',$this->monto_mejoras,true);
		$criteria->compare('monto_cuota_mejoras',$this->monto_cuota_mejoras,true);
		$criteria->compare('fecha_de_pago_abono',$this->fecha_de_pago_abono,true);
		$criteria->compare('fecha_ultimo_pago',$this->fecha_ultimo_pago,true);
		$criteria->compare('fecha_de_entrega',$this->fecha_de_entrega,true);
		$criteria->compare('fecha_de_permiso_contruccion',$this->fecha_de_permiso_contruccion,true);
		$criteria->compare('fecha_de_permiso_bomberos',$this->fecha_de_permiso_bomberos,true);
		$criteria->compare('fecha_de_permiso_ocupacion',$this->fecha_de_permiso_ocupacion,true);
		$criteria->compare('fecha_de_carta_promesa',$this->fecha_de_carta_promesa,true);
                $criteria->order = 'CARTERA_90_DIAS DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function search90()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->condition = 'CARTERA_120_DIAS <= 0 AND status_de_lote  = '."'COBRO'".' AND status_plan_pago  != '."'RETIRO'".' AND status_de_lote !=  '."'LIQUIDADO'".'  ';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
        $criteria->compare('upper(t.nombre_de_empresa)',strtoupper($this->nombre_de_empresa),true);		
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
        $criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('numero_de_lote',$this->numero_de_lote,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);
		$criteria->compare('cartera_corriente',$this->cartera_corriente,true);
		$criteria->compare('cartera_30_dias',$this->cartera_30_dias,true);
		$criteria->compare('cartera_60_dias',$this->cartera_60_dias,true);
		$criteria->compare('cartera_90_dias',$this->cartera_90_dias,true);

	

		$criteria->order = 'CARTERA_90_DIAS DESC';
                $criteria->limit = 20;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' => 5),

                'totalItemCount'=>'50',
                 
      
        ));
	}

    //Busca todos aquelllos Clientes con una Cartera Mayor a 120 días y que sean Diferentes de Retiro
    public function search120()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition = 'CARTERA_120_DIAS > 0 AND status_plan_pago = '."'COBROS'".' AND status_plan_pago  != '."'RETIRO'".' ';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('nombre_de_empresa',$this->nombre_de_empresa,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('numero_de_lote',$this->numero_de_lote,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);
		$criteria->compare('cartera_corriente',$this->cartera_corriente,true);
		$criteria->compare('cartera_30_dias',$this->cartera_30_dias,true);
		$criteria->compare('cartera_60_dias',$this->cartera_60_dias,true);
		$criteria->compare('cartera_90_dias',$this->cartera_90_dias,true);
		$criteria->compare('cartera_120_dias',$this->cartera_120_dias,true);
	

		$criteria->order = 'cartera_120_dias DESC';
                $criteria->limit = 20;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' => 5),

                'totalItemCount'=>'50',
                 
      
        ));
	}
    
    //Noventa Dias Cliente    
    public function noventadias()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
         $criteria->condition = 'status_plan_pago = '."'COBROS'".' AND status_plan_pago  != '."'RETIRO'".' AND status_de_lote !=  '."'LIQUIDADO'".'  ';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);

                $criteria->compare('upper(t.nombre_de_empresa)',strtoupper($this->nombre_de_empresa),true);
		//$criteria->compare('nombre_de_empresa',$this->nombre_de_empresa,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('numero_de_lote',$this->numero_de_lote,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);	
		$criteria->compare('forma_de_pago',$this->forma_de_pago,true);
		$criteria->compare('cantidad_de_quotas',$this->cantidad_de_quotas,true);
		$criteria->compare('cantidad_de_quotas_mejoras',$this->cantidad_de_quotas_mejoras,true);
		$criteria->compare('tipo_de_cliente',$this->tipo_de_cliente,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('status_plan_pago',$this->status_plan_pago,true);
		$criteria->compare('monto_ultimo_pago',$this->monto_ultimo_pago,true);
		$criteria->compare('cartera_corriente',$this->cartera_corriente,true);
		$criteria->compare('cartera_30_dias',$this->cartera_30_dias,true);
		$criteria->compare('cartera_60_dias',$this->cartera_60_dias,true);
		$criteria->compare('cartera_90_dias',$this->cartera_90_dias,true);
		$criteria->compare('cartera_120_dias',$this->cartera_120_dias,true);
		$criteria->compare('total_vencido',$this->total_vencido,true);
	
	
                $criteria->order = 'CARTERA_90_DIAS DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
 
	}
    
    ///////////////////////////PAZ Y SALVO////////////////////////////////////
        
    public function clientestramites()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
               
		$criteria=new CDbCriteria;
      
        $criteria->condition = 'pazysalvo = 0 AND status_plan_pago !=  '."'RETIRO'".' AND status_de_lote =  '."'TRAMITE'".' AND status_de_lote !=  '."'LIQUIDADO'".'';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('upper(t.nombre_de_empresa)',strtoupper($this->nombre_de_empresa),true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('observacion_tramite',$this->observacion_tramite,true);
		$criteria->compare('upper(t.numero_de_lote)',strtoupper($this->numero_de_lote),true);
		$criteria->compare('agente_tramite',$this->agente_tramite,true);
		
		
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);


		$criteria->order = 'proyecto, numero_de_lote DESC';
                $criteria->limit = 20;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' => 5),

                'totalItemCount'=>'50',
                 
      
        ));
	}

    //Busca solo los Clientes asignados a un Tramitador en particular
    public function clientescontramitador($nombretramitador)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
               
		$criteria=new CDbCriteria;
      
        $criteria->condition = 'pazysalvo = 0 AND status_plan_pago !=  '."'RETIRO'".' AND status_de_lote =  '."'TRAMITE'".' ';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
		$criteria->compare('agente_tramite',$nombretramitador);
		$criteria->compare('upper(t.nombre_de_empresa)',strtoupper($this->nombre_de_empresa),true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('observacion_tramite',$this->observacion_tramite,true);
		$criteria->compare('upper(t.numero_de_lote)',strtoupper($this->numero_de_lote),true);
		$criteria->compare('confeccion_protocolo',$this->confeccion_protocolo,true);
		$criteria->compare('pazysalvo',$this->pazysalvo,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);
		//	$criteria->compare('upper(t.numero_de_lote)',strtoupper($this->numero_de_lote),true);


		$criteria->order = 'proyecto, numero_de_lote DESC';
                $criteria->limit = 30;
                $criteria->offset = 0;
                return new CActiveDataProvider($this, array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' => 5),

                'totalItemCount'=>'50',
                 
      
        ));
	}

	//Para la generación del Reporte en Excel
	public function clientesexcel()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
 		$criteria->condition = 'status_plan_pago != '."'RETIRO'".' AND (cartera_corriente > '."'1'".' OR cartera_30_dias > '."'1'".' OR cartera_60_dias >'."'1'".' OR cartera_90_dias > '."'1'".' OR cartera_120_dias > '."'1'".' OR total_vencido > '."'1'".')';
		$criteria->compare('id_cliente_gs',$this->id_cliente_gs);
  		$criteria->compare('upper(t.nombre_de_empresa)',strtoupper($this->nombre_de_empresa),true);		

		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('numero_de_lote',$this->numero_de_lote,true);
		$criteria->compare('id_cliente',$this->id_cliente,true);
		$criteria->compare('id_proyecto',$this->id_proyecto,true);


		$criteria->compare('cartera_corriente',$this->cartera_corriente,true);
		$criteria->compare('cartera_30_dias',$this->cartera_30_dias,true);
		$criteria->compare('cartera_60_dias',$this->cartera_60_dias,true);
		$criteria->compare('cartera_90_dias',$this->cartera_90_dias,true);
		$criteria->compare('cartera_120_dias',$this->cartera_120_dias,true);
		$criteria->compare('total_vencido',$this->total_vencido,true);

        $criteria->order = 'CARTERA_90_DIAS DESC';
		


   		$data = new CActiveDataProvider(get_class($this), array(
                                'criteria'=> $criteria,     
                                'pagination' => array('pageSize' =>10000),

                'totalItemCount'=>'5000',   ));
        $_SESSION['Cliente']=$data; // get all data and filtered data :)

        return $data;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
