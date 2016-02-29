<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property string $id
 * @property string $Contacto
 * @property string $Empresa
 * @property string $Email
 * @property string $Telefono_1
 * @property string $Telefono_2
 * @property string $Cellular
 * @property string $Fax
 * @property string $Direccion
 * @property string $Ciudad
 * @property string $Estado
 * @property string $Pais
 * @property string $Status
 * @property string $Prioridad
 * @property string $Empleados
 * @property string $Industria
 * @property string $Tipo
 * @property string $Credit_Term
 * @property integer $Due_Days
 * @property string $Credit_Amount_Limit
 * @property string $Actualizado
 * @property string $Agente
 * @property string $Vendedor
 * @property string $Vendedor2
 * @property string $WebSite
 * @property string $Created
 * @property string $Sales_Account
 * @property string $Social_ID
 * @property string $Parent_Customer
 * @property string $Price_List
 * @property string $Cedula
 * @property string $PortalType
 * @property string $Taxid
 * @property string $Taxable
 * @property string $Departamento
 * @property string $ActualizadoPor
 * @property string $BirthDate
 * @property string $Company
 * @property string $RUC
 * @property string $Referencia
 * @property string $Cobrador
 * @property string $Categoria
 * @property string $Areas_Negocios
 * @property string $Pasaporte
 * @property string $Migration
 * @property string $Apartado
 * @property string $Document_Type
 * @property string $Nombre
 * @property string $Apellido
 * @property string $POS
 * @property string $NOEMAX
 * @property string $Tax_Authorized
 * @property string $Cashier
 * @property string $Razon_Social
 * @property string $Representante_Legal
 * @property string $Clase_Cliente
 * @property string $Cliente_orden
 * @property string $blob_bill
 * @property string $Oficial_credito
 * @property string $Sub_Cliente
 * @property string $Idioma_Cliente
 * @property string $Impuesto
 * @property string $Origen_Cliente
 * @property string $Firma_autorizacion
 * @property string $Cedula_Representante_Legal
 * @property integer $DV
 * @property string $relacion_cliente
 * @property string $ejecutivo_cuenta
 * @property string $Calificacion_cliente
 * @property string $customers_mercado
 * @property string $nombre_apellido
 * @property string $Omitir_de_Analisis
 * @property string $Email_Publicidad
 * @property string $Tipo_Contribuyente
 * @property string $Actividad_Economica
 * @property string $Descuento_Maximo
 * @property string $Lugar_trabajo
 * @property string $Ocupacion
 * @property string $Fecha_Nacimiento
 * @property string $Sexo
 * @property string $Estado_Civil
 * @property string $Nacionalidad
 * @property string $Nombre_Ref1
 * @property string $Nombre_Ref2
 * @property string $Telefono_Ref1
 * @property string $Telefono_Ref2
 * @property string $Relacion_Ref1
 * @property string $Relacion_Ref2
 * @property string $Barriada1
 * @property string $Calle1
 * @property string $Casa1
 * @property string $Medio1
 * @property string $Barriada2
 * @property string $Calle2
 * @property string $Casa2
 * @property string $Medio2
 * @property string $Barriada
 * @property string $Calle
 * @property string $Casa
 * @property string $Medio
 * @property string $Distrito
 * @property string $Corregimiento
 * @property string $Provincia
 * @property string $Extencion
 */
class Customers extends GActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Empresa, Due_Days, Credit_Amount_Limit, Vendedor, Taxid, BirthDate, Company, RUC, Referencia, Areas_Negocios, Nombre, Apellido, POS, NOEMAX, Tax_Authorized, Cashier, Oficial_credito, customers_mercado, Actividad_Economica, Lugar_trabajo, Ocupacion, Fecha_Nacimiento, Sexo, Estado_Civil, Nacionalidad, Nombre_Ref1, Telefono_Ref1, Relacion_Ref1, Casa1, Medio1, Casa, Medio', 'required'),
			array('Due_Days, DV', 'numerical', 'integerOnly'=>true),
			array('id, Credit_Amount_Limit, Sales_Account, Parent_Customer, Sexo, Telefono_Ref1, Telefono_Ref2, Medio1, Medio2, Medio, Distrito, Corregimiento, Provincia', 'length', 'max'=>22),
			array('Contacto, Telefono_1, Telefono_2, Cellular, Fax, Ciudad, Estado, Pais, Prioridad, Industria, Tipo, Credit_Term, Agente, WebSite, Price_List, Cedula, ActualizadoPor, Referencia, Razon_Social, Representante_Legal, blob_bill, Oficial_credito, Sub_Cliente, Idioma_Cliente, Origen_Cliente, Firma_autorizacion, Cedula_Representante_Legal, relacion_cliente, Calificacion_cliente, customers_mercado, nombre_apellido', 'length', 'max'=>100),
			array('Empresa, Email, Social_ID, ejecutivo_cuenta, Email_Publicidad', 'length', 'max'=>200),
			array('Status', 'length', 'max'=>20),
			array('Empleados, Taxid', 'length', 'max'=>10),
			array('Vendedor, Vendedor2, Cobrador, Categoria, Pasaporte, Nombre, Apellido, POS, NOEMAX, Tax_Authorized, Cashier, Lugar_trabajo, Ocupacion, Nacionalidad, Nombre_Ref1, Nombre_Ref2, Relacion_Ref1, Relacion_Ref2, Barriada1, Calle1, Casa1, Barriada2, Calle2, Casa2, Barriada, Calle, Casa', 'length', 'max'=>50),
			array('PortalType', 'length', 'max'=>25),
			array('Taxable, Migration, Cliente_orden, Impuesto, Omitir_de_Analisis', 'length', 'max'=>3),
			array('Company, Areas_Negocios', 'length', 'max'=>255),
			array('RUC', 'length', 'max'=>55),
			array('Document_Type', 'length', 'max'=>60),
			array('Clase_Cliente', 'length', 'max'=>8),
			array('Tipo_Contribuyente, Actividad_Economica', 'length', 'max'=>4),
			array('Descuento_Maximo, Extencion', 'length', 'max'=>11),
			array('Estado_Civil', 'length', 'max'=>13),
			array('Direccion, Actualizado, Created, Departamento, Apartado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Contacto, Empresa, Email, Telefono_1, Telefono_2, Cellular, Fax, Direccion, Ciudad, Estado, Pais, Status, Prioridad, Empleados, Industria, Tipo, Credit_Term, Due_Days, Credit_Amount_Limit, Actualizado, Agente, Vendedor, Vendedor2, WebSite, Created, Sales_Account, Social_ID, Parent_Customer, Price_List, Cedula, PortalType, Taxid, Taxable, Departamento, ActualizadoPor, BirthDate, Company, RUC, Referencia, Cobrador, Categoria, Areas_Negocios, Pasaporte, Migration, Apartado, Document_Type, Nombre, Apellido, POS, NOEMAX, Tax_Authorized, Cashier, Razon_Social, Representante_Legal, Clase_Cliente, Cliente_orden, blob_bill, Oficial_credito, Sub_Cliente, Idioma_Cliente, Impuesto, Origen_Cliente, Firma_autorizacion, Cedula_Representante_Legal, DV, relacion_cliente, ejecutivo_cuenta, Calificacion_cliente, customers_mercado, nombre_apellido, Omitir_de_Analisis, Email_Publicidad, Tipo_Contribuyente, Actividad_Economica, Descuento_Maximo, Lugar_trabajo, Ocupacion, Fecha_Nacimiento, Sexo, Estado_Civil, Nacionalidad, Nombre_Ref1, Nombre_Ref2, Telefono_Ref1, Telefono_Ref2, Relacion_Ref1, Relacion_Ref2, Barriada1, Calle1, Casa1, Medio1, Barriada2, Calle2, Casa2, Medio2, Barriada, Calle, Casa, Medio, Distrito, Corregimiento, Provincia, Extencion', 'safe', 'on'=>'search'),
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
			//'idquotes' => array(self::BELONGS_TO, 'Quotes', 'id'),
                     'idquotes'=>array(self::HAS_MANY, 'Quotes', 'Cliente'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Contacto' => 'Contacto',
			'Empresa' => 'Empresa',
			'Email' => 'Email',
			'Telefono_1' => 'Telefono 1',
			'Telefono_2' => 'Telefono 2',
			'Cellular' => 'Cellular',
			'Fax' => 'Fax',
			'Direccion' => 'Direccion',
			'Ciudad' => 'Ciudad',
			'Estado' => 'Estado',
			'Pais' => 'Pais',
			'Status' => 'Status',
			'Prioridad' => 'Prioridad',
			'Empleados' => 'Empleados',
			'Industria' => 'Industria',
			'Tipo' => 'Tipo',
			'Credit_Term' => 'Credit Term',
			'Due_Days' => 'Due Days',
			'Credit_Amount_Limit' => 'Credit Amount Limit',
			'Actualizado' => 'Actualizado',
			'Agente' => 'Agente',
			'Vendedor' => 'Vendedor',
			'Vendedor2' => 'Vendedor2',
			'WebSite' => 'Web Site',
			'Created' => 'Created',
			'Sales_Account' => 'Sales Account',
			'Social_ID' => 'Social',
			'Parent_Customer' => 'Parent Customer',
			'Price_List' => 'Price List',
			'Cedula' => 'Cedula',
			'PortalType' => 'Portal Type',
			'Taxid' => 'Taxid',
			'Taxable' => 'Taxable',
			'Departamento' => 'Departamento',
			'ActualizadoPor' => 'Actualizado Por',
			'BirthDate' => 'Birth Date',
			'Company' => 'Company',
			'RUC' => 'Cedula',
			'Referencia' => 'Referencia',
			'Cobrador' => 'Cobrador',
			'Categoria' => 'Categoria',
			'Areas_Negocios' => 'Areas Negocios',
			'Pasaporte' => 'Pasaporte',
			'Migration' => 'Migration',
			'Apartado' => 'Apartado',
			'Document_Type' => 'Document Type',
			'Nombre' => 'Nombre Cliente',
			'Apellido' => 'Apellido Cliente',
			'POS' => 'Pos',
			'NOEMAX' => 'Noemax',
			'Tax_Authorized' => 'Tax Authorized',
			'Cashier' => 'Cashier',
			'Razon_Social' => 'Razon Social',
			'Representante_Legal' => 'Representante Legal',
			'Clase_Cliente' => 'Clase Cliente',
			'Cliente_orden' => 'Cliente Orden',
			'blob_bill' => 'Blob Bill',
			'Oficial_credito' => 'Oficial Credito',
			'Sub_Cliente' => 'Sub Cliente',
			'Idioma_Cliente' => 'Idioma Cliente',
			'Impuesto' => 'Impuesto',
			'Origen_Cliente' => 'Origen Cliente',
			'Firma_autorizacion' => 'Firma Autorizacion',
			'Cedula_Representante_Legal' => 'Cedula Representante Legal',
			'DV' => 'Dv',
			'relacion_cliente' => 'Relacion Cliente',
			'ejecutivo_cuenta' => 'Ejecutivo Cuenta',
			'Calificacion_cliente' => 'Calificacion Cliente',
			'customers_mercado' => 'Customers Mercado',
			'nombre_apellido' => 'Nombre Apellido',
			'Omitir_de_Analisis' => 'Omitir De Analisis',
			'Email_Publicidad' => 'Email Publicidad',
			'Tipo_Contribuyente' => 'Tipo Contribuyente',
			'Actividad_Economica' => 'Actividad Economica',
			'Descuento_Maximo' => 'Descuento Maximo',
			'Lugar_trabajo' => 'Lugar Trabajo',
			'Ocupacion' => 'Ocupacion',
			'Fecha_Nacimiento' => 'Fecha Nacimiento',
			'Sexo' => 'Sexo',
			'Estado_Civil' => 'Estado Civil',
			'Nacionalidad' => 'Nacionalidad',
			'Nombre_Ref1' => 'Nombre Ref1',
			'Nombre_Ref2' => 'Nombre Ref2',
			'Telefono_Ref1' => 'Telefono Ref1',
			'Telefono_Ref2' => 'Telefono Ref2',
			'Relacion_Ref1' => 'Relacion Ref1',
			'Relacion_Ref2' => 'Relacion Ref2',
			'Barriada1' => 'Barriada1',
			'Calle1' => 'Calle1',
			'Casa1' => 'Casa1',
			'Medio1' => 'Medio1',
			'Barriada2' => 'Barriada2',
			'Calle2' => 'Calle2',
			'Casa2' => 'Casa2',
			'Medio2' => 'Medio2',
			'Barriada' => 'Barriada',
			'Calle' => 'Calle',
			'Casa' => 'Casa',
			'Medio' => 'Medio',
			'Distrito' => 'Distrito',
			'Corregimiento' => 'Corregimiento',
			'Provincia' => 'Provincia',
			'Extencion' => 'Extencion',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('Contacto',$this->Contacto,true);
		$criteria->compare('Empresa',$this->Empresa,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Telefono_1',$this->Telefono_1,true);
		$criteria->compare('Telefono_2',$this->Telefono_2,true);
		$criteria->compare('Cellular',$this->Cellular,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Estado',$this->Estado,true);
		$criteria->compare('Pais',$this->Pais,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Prioridad',$this->Prioridad,true);
		$criteria->compare('Empleados',$this->Empleados,true);
		$criteria->compare('Industria',$this->Industria,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('Credit_Term',$this->Credit_Term,true);
		$criteria->compare('Due_Days',$this->Due_Days);
		$criteria->compare('Credit_Amount_Limit',$this->Credit_Amount_Limit,true);
		$criteria->compare('Actualizado',$this->Actualizado,true);
		$criteria->compare('Agente',$this->Agente,true);
		$criteria->compare('Vendedor',$this->Vendedor,true);
		$criteria->compare('Vendedor2',$this->Vendedor2,true);
		$criteria->compare('WebSite',$this->WebSite,true);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('Sales_Account',$this->Sales_Account,true);
		$criteria->compare('Social_ID',$this->Social_ID,true);
		$criteria->compare('Parent_Customer',$this->Parent_Customer,true);
		$criteria->compare('Price_List',$this->Price_List,true);
		$criteria->compare('Cedula',$this->Cedula,true);
		$criteria->compare('PortalType',$this->PortalType,true);
		$criteria->compare('Taxid',$this->Taxid,true);
		$criteria->compare('Taxable',$this->Taxable,true);
		$criteria->compare('Departamento',$this->Departamento,true);
		$criteria->compare('ActualizadoPor',$this->ActualizadoPor,true);
		$criteria->compare('BirthDate',$this->BirthDate,true);
		$criteria->compare('Company',$this->Company,true);
		$criteria->compare('RUC',$this->RUC,true);
		$criteria->compare('Referencia',$this->Referencia,true);
		$criteria->compare('Cobrador',$this->Cobrador,true);
		$criteria->compare('Categoria',$this->Categoria,true);
		$criteria->compare('Areas_Negocios',$this->Areas_Negocios,true);
		$criteria->compare('Pasaporte',$this->Pasaporte,true);
		$criteria->compare('Migration',$this->Migration,true);
		$criteria->compare('Apartado',$this->Apartado,true);
		$criteria->compare('Document_Type',$this->Document_Type,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Apellido',$this->Apellido,true);
		$criteria->compare('POS',$this->POS,true);
		$criteria->compare('NOEMAX',$this->NOEMAX,true);
		$criteria->compare('Tax_Authorized',$this->Tax_Authorized,true);
		$criteria->compare('Cashier',$this->Cashier,true);
		$criteria->compare('Razon_Social',$this->Razon_Social,true);
		$criteria->compare('Representante_Legal',$this->Representante_Legal,true);
		$criteria->compare('Clase_Cliente',$this->Clase_Cliente,true);
		$criteria->compare('Cliente_orden',$this->Cliente_orden,true);
		$criteria->compare('blob_bill',$this->blob_bill,true);
		$criteria->compare('Oficial_credito',$this->Oficial_credito,true);
		$criteria->compare('Sub_Cliente',$this->Sub_Cliente,true);
		$criteria->compare('Idioma_Cliente',$this->Idioma_Cliente,true);
		$criteria->compare('Impuesto',$this->Impuesto,true);
		$criteria->compare('Origen_Cliente',$this->Origen_Cliente,true);
		$criteria->compare('Firma_autorizacion',$this->Firma_autorizacion,true);
		$criteria->compare('Cedula_Representante_Legal',$this->Cedula_Representante_Legal,true);
		$criteria->compare('DV',$this->DV);
		$criteria->compare('relacion_cliente',$this->relacion_cliente,true);
		$criteria->compare('ejecutivo_cuenta',$this->ejecutivo_cuenta,true);
		$criteria->compare('Calificacion_cliente',$this->Calificacion_cliente,true);
		$criteria->compare('customers_mercado',$this->customers_mercado,true);
		$criteria->compare('nombre_apellido',$this->nombre_apellido,true);
		$criteria->compare('Omitir_de_Analisis',$this->Omitir_de_Analisis,true);
		$criteria->compare('Email_Publicidad',$this->Email_Publicidad,true);
		$criteria->compare('Tipo_Contribuyente',$this->Tipo_Contribuyente,true);
		$criteria->compare('Actividad_Economica',$this->Actividad_Economica,true);
		$criteria->compare('Descuento_Maximo',$this->Descuento_Maximo,true);
		$criteria->compare('Lugar_trabajo',$this->Lugar_trabajo,true);
		$criteria->compare('Ocupacion',$this->Ocupacion,true);
		$criteria->compare('Fecha_Nacimiento',$this->Fecha_Nacimiento,true);
		$criteria->compare('Sexo',$this->Sexo,true);
		$criteria->compare('Estado_Civil',$this->Estado_Civil,true);
		$criteria->compare('Nacionalidad',$this->Nacionalidad,true);
		$criteria->compare('Nombre_Ref1',$this->Nombre_Ref1,true);
		$criteria->compare('Nombre_Ref2',$this->Nombre_Ref2,true);
		$criteria->compare('Telefono_Ref1',$this->Telefono_Ref1,true);
		$criteria->compare('Telefono_Ref2',$this->Telefono_Ref2,true);
		$criteria->compare('Relacion_Ref1',$this->Relacion_Ref1,true);
		$criteria->compare('Relacion_Ref2',$this->Relacion_Ref2,true);
		$criteria->compare('Barriada1',$this->Barriada1,true);
		$criteria->compare('Calle1',$this->Calle1,true);
		$criteria->compare('Casa1',$this->Casa1,true);
		$criteria->compare('Medio1',$this->Medio1,true);
		$criteria->compare('Barriada2',$this->Barriada2,true);
		$criteria->compare('Calle2',$this->Calle2,true);
		$criteria->compare('Casa2',$this->Casa2,true);
		$criteria->compare('Medio2',$this->Medio2,true);
		$criteria->compare('Barriada',$this->Barriada,true);
		$criteria->compare('Calle',$this->Calle,true);
		$criteria->compare('Casa',$this->Casa,true);
		$criteria->compare('Medio',$this->Medio,true);
		$criteria->compare('Distrito',$this->Distrito,true);
		$criteria->compare('Corregimiento',$this->Corregimiento,true);
		$criteria->compare('Provincia',$this->Provincia,true);
		$criteria->compare('Extencion',$this->Extencion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        
        public function buscarclientes()
        {
        /*select
`t1`.`id` AS `ID_CLIENTE`,
`CarteraCliente_Corriente`(`t3`.`id`) AS `CARTERA_CORRIENTE`,
`CarteraCliente_30`(`t3`.`id`) AS `CARTERA_30_DIAS`,
`CarteraCliente_60`(`t3`.`id`) AS `CARTERA_60_DIAS`,
`CarteraCliente_90`(`t3`.`id`) AS `CARTERA_90_DIAS`,
`CarteraCliente_120`(`t3`.`id`) AS `CARTERA_120_DIAS`,
`CarteraCliente_TotalVencido`(`t3`.`id`) AS `TOTAL_VENCIDO`
         * from (((((((`customers` `t1` 
         * join `quotes_relation_buyers` `t2` on((`t1`.`id` = `t2`.`Cliente`)))
         * join `quotes` `t3` on((`t3`.`id` = `t2`.`Quote`))) 
         * join `quotes_details` `t4` on((`t4`.`Bill` = `t3`.`id`)))
         * join `project_models_house` `t8` on((`t8`.`id` = `t4`.`Codigo`))) 
         * join `quotes_plan_pago` `t6` on((`t6`.`Quote` = `t3`.`id`)))
         * join `quotes_seg_venta` `t5` on((`t5`.`quote` = `t3`.`id`))) 
         * left join `quotes_plan_pago_mejoras` `t7` on((`t7`.`id` = `t5`.`id`))) order by `t3`.`id`*/
        $criteria = new CDbCriteria; 

       
        $criteria->compare('Nombre',$this->Nombre,true);
	$criteria->compare('Apellido',$this->Apellido,true);
        $criteria->compare('RUC',$this->Apellido,true);
        $criteria->compare('id',$this->id,true);
 /*
$criteria->select='CarteraCliente_Corriente(t3.id) AS CARTERA_CORRIENTE';
$criteria->select='CarteraCliente_30(t3.id) AS CARTERA_30_DIAS';
$criteria->select='CarteraCliente_60(t3.id) AS CARTERA_60_DIAS';
$criteria->select='CarteraCliente_90(t3.id) AS CARTERA_90_DIAS';
$criteria->select='CarteraCliente_120(t3.id) AS CARTERA_120_DIAS';
$criteria->select='CarteraCliente_TotalVencido(t3.id) AS TOTAL_VENCIDO';

  $criteria->select='CarteraCliente_Corriente(t3.id) AS CARTERA_CORRIENTE,
CarteraCliente_30(t3.id) AS CARTERA_30_DIAS,
CarteraCliente_60(t3.id) AS CARTERA_60_DIAS,
CarteraCliente_90(t3.id) AS CARTERA_90_DIAS,
CarteraCliente_120(t3.id) AS CARTERA_120_DIAS,
CarteraCliente_TotalVencido(t3.id) AS TOTAL_VENCIDO';
//  $criteria->with(' customers t ');
   
      //    $criteria->join = ' customers t ON customers.id = t2.Cliente ';
        $criteria->join .= ' LEFT JOIN quotes_relation_buyers t2 ON customers.id = t2.Cliente ';
        $criteria->join .= 'LEFT JOIN quotes t3 ON t3.id = t2.Quote';
        $criteria->join .= 'LEFT JOIN quotes_details t4 ON t4.Bill = t3.id';
        $criteria->join .= 'LEFT JOIN project_models_house t8 ON t8.id = t4.Codigo';
        $criteria->join .= 'LEFT JOIN quotes_plan_pago t6 ON t6.Quote = t3.id';
        $criteria->join .= 'LEFT JOIN quotes_seg_venta t5 ON t5.quote = t3.id';
        $criteria->join .= 'LEFT JOIN quotes_plan_pago_mejoras t7 ON t7.id = t5.id';
        $criteria->condition = 'Status = "ACTIVE" ';
         
        */
        $criteria->order = 'Nombre DESC';
        $criteria->limit = 20;
        $criteria->offset = 0;
        return new CActiveDataProvider($this, array(
                        'criteria'=> $criteria,     
                        'pagination' => array('pageSize' => 5),

          'totalItemCount'=>'50',
                 
      
        ));
        }
	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbconix;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
