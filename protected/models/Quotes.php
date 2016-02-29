<?php

/**
 * This is the model class for table "quotes".
 *
 * The followings are the available columns in table 'quotes':
 * @property string $id
 * @property string $Cliente
 * @property string $Lead
 * @property string $Contract
 * @property string $Opportunity
 * @property string $Company
 * @property string $WareHouse
 * @property string $BackOrder_Reff
 * @property string $Date
 * @property string $Quote_DiscID
 * @property string $Discount
 * @property string $Others_Type
 * @property string $Others
 * @property string $SubTotal
 * @property string $TaxID
 * @property string $Taxes
 * @property string $Porcentaje_Abono
 * @property string $Abono_Inicial
 * @property string $financiamiento
 * @property string $Total
 * @property string $Agente
 * @property string $Actualizado
 * @property string $Status
 * @property string $Expira
 * @property string $Reservar_Productos
 * @property string $Type
 * @property string $SentToCustomer
 * @property string $SalesTerm
 * @property string $LeadRelated
 * @property string $Note
 * @property string $Ticket
 * @property string $Price_List
 * @property string $Pais
 * @property string $Fecha_Entrega
 * @property integer $Dias_Entrega
 * @property string $Vendor
 * @property string $Tipo_Entrega
 * @property string $CreatedBy
 * @property string $Proyect
 * @property string $Printed
 * @property string $RE
 * @property string $AprovedBy
 * @property string $AprovedDate
 * @property string $Sucursal
 * @property string $Contacto_Entrega
 * @property string $Cargo
 * @property string $Departamento
 * @property string $Comentario_Entrega
 * @property string $Comentario
 * @property string $Destino_Carga
 * @property string $Instrucciones_Especiales
 * @property string $ReplicaCompany
 * @property string $Flete
 * @property string $Manejo
 * @property string $Acarreo
 * @property string $One_Dev_Ext
 * @property string $Doc_ZonaLibre
 * @property string $Ley
 * @property string $CreatedDate
 * @property string $Condiciones_Pago
 * @property string $PorVisa
 * @property string $NomVisa
 * @property string $Seguro
 * @property string $Incoterms
 * @property string $Reempaque
 * @property string $PorOther
 * @property string $NomOther
 * @property string $WorkFlow
 * @property string $WorkFlow1
 * @property string $WorkFlow_Step
 * @property string $Asignado
 * @property string $ShowWO
 * @property string $ShowCancel
 * @property string $ShowEdit
 * @property string $ShowFacturar
 * @property string $Departamento_Origen
 * @property string $Comments
 * @property string $StepRespaldo
 * @property string $Created
 * @property string $ShowCubicaje
 * @property string $ShowPeso
 * @property string $Updated
 * @property string $UpdatedBy
 * @property string $Notificar_a
 * @property string $SRI
 * @property string $Tipo
 * @property string $ShowBILL_New
 * @property string $Cancel_Comment
 * @property string $Edit_Cost
 * @property string $Asignado_a_compras
 * @property string $Tienda
 * @property string $Cot_Tienda
 * @property string $Nivelar
 * @property string $Titulo
 * @property string $Categoria
 * @property string $Fecha_entrega_preventa
 * @property string $Requerimiento_Preventa
 * @property string $Comentario_Preventa
 * @property string $Nombre_Cliente
 * @property string $Lost_Sale_Comment
 * @property string $Lost_Sale_User
 * @property string $Lost_Sale_Date
 * @property string $ExpiraDays
 * @property string $MargenTP
 * @property string $MargenT
 * @property string $Orden_de_Compra
 * @property string $NoneTaxes
 * @property string $Referencia
 * @property string $Terminate_Date
 * @property string $Lost_Sale_Reazon
 * @property string $Delivery_Direccion
 * @property string $DeliveryNeed
 * @property string $WareHouse_Session
 * @property string $Telefono_Cliente
 * @property string $DeliveryType
 * @property string $Instalation
 * @property string $Provincia
 * @property string $Distrito
 * @property string $Corregimiento
 * @property string $AnulateComment
 * @property string $Aproved_Date
 * @property string $Aproved_User
 * @property string $Delivery_Date
 * @property string $Delivery_Hour
 * @property string $Venta_Exportacion
 * @property string $VendedorTipo
 * @property string $ApplyDate
 * @property string $ApplyUser
 * @property string $Sucursal_Venta
 * @property string $SaveAs_From
 * @property string $Cambio
 * @property string $Email_Cliente
 * @property string $Vendor2
 * @property string $Marca
 * @property string $Orden_de_Venta
 * @property string $Tipo_de_Despacho
 * @property integer $Total_Bultos
 * @property string $Consignado
 * @property string $Mostrar_Peso
 * @property string $Excursionista
 * @property string $Mostrar_Cubicaje
 * @property string $OF
 * @property string $Intercompany
 * @property string $pos
 * @property string $Vendor_Change_Comment
 * @property string $Bono
 * @property string $Expira_Quote
 *
 * The followings are the available model relations:
 * @property Warehouses $wareHouse
 */
class Quotes extends GActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enx_suarez.quotes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Contract, WareHouse, BackOrder_Reff, Quote_DiscID, Others_Type, SubTotal, TaxID, Taxes, Abono_Inicial, financiamiento, Total, Agente, Actualizado, Fecha_Entrega, Printed, RE, AprovedBy, AprovedDate, Flete, Manejo, Acarreo, One_Dev_Ext, Doc_ZonaLibre, Ley, CreatedDate, PorVisa, NomVisa, Seguro, Reempaque, PorOther, NomOther, WorkFlow, WorkFlow1, WorkFlow_Step, Asignado, Departamento_Origen, Comments, StepRespaldo, Created, Updated, UpdatedBy, SRI, Tipo, Cancel_Comment, Titulo, Fecha_entrega_preventa, Lost_Sale_Comment, Lost_Sale_User, Lost_Sale_Date, ExpiraDays, MargenTP, MargenT, Terminate_Date, Lost_Sale_Reazon, WareHouse_Session, AnulateComment, Aproved_Date, Aproved_User, Delivery_Date, Delivery_Hour, VendedorTipo, ApplyDate, ApplyUser, Sucursal_Venta, SaveAs_From, Cambio, pos', 'required'),
			array('Dias_Entrega, Total_Bultos', 'numerical', 'integerOnly'=>true),
			array('id, Cliente, Lead, Contract, Opportunity, Quote_DiscID, Discount, Others, SubTotal, Taxes, Porcentaje_Abono, Abono_Inicial, financiamiento, Total, RE, Flete, Manejo, Acarreo, One_Dev_Ext, Doc_ZonaLibre, Ley, PorVisa, Seguro, Reempaque, PorOther, SRI, Nombre_Cliente, ExpiraDays, MargenTP, MargenT, Telefono_Cliente, SaveAs_From, Cambio, Email_Cliente, OF, Intercompany, Bono', 'length', 'max'=>22),
			array('Company, Condiciones_Pago', 'length', 'max'=>200),
			array('WareHouse, SalesTerm, Price_List, Pais, Vendor, Proyect, Sucursal, Contacto_Entrega, Cargo, Destino_Carga, ReplicaCompany, Departamento_Origen, Notificar_a, Categoria, Provincia, Distrito, Corregimiento, Sucursal_Venta', 'length', 'max'=>100),
			array('BackOrder_Reff, TaxID, Ticket, Expira_Quote', 'length', 'max'=>11),
			array('Others_Type', 'length', 'max'=>20),
			array('Agente, CreatedBy, AprovedBy, Departamento, NomVisa, WorkFlow, WorkFlow1, WorkFlow_Step, Asignado, UpdatedBy, Tipo, Lost_Sale_User, Referencia, DeliveryType, Aproved_User, VendedorTipo, ApplyUser, pos', 'length', 'max'=>50),
			array('Status', 'length', 'max'=>16),
			array('Reservar_Productos, SentToCustomer, ShowWO, ShowCancel, ShowEdit, ShowFacturar, ShowCubicaje, ShowPeso, ShowBILL_New, Edit_Cost, Asignado_a_compras, Tienda, NoneTaxes, DeliveryNeed, Instalation, Venta_Exportacion, Mostrar_Peso, Mostrar_Cubicaje', 'length', 'max'=>3),
			array('Type, Tipo_Entrega', 'length', 'max'=>17),
			array('LeadRelated, Cot_Tienda, Nivelar', 'length', 'max'=>1),
			array('Printed, Vendor2, Marca, Tipo_de_Despacho, Consignado, Excursionista', 'length', 'max'=>255),
			array('Incoterms', 'length', 'max'=>60),
			array('NomOther, Orden_de_Compra, Orden_de_Venta', 'length', 'max'=>55),
			array('StepRespaldo', 'length', 'max'=>10),
			array('Lost_Sale_Reazon, WareHouse_Session', 'length', 'max'=>150),
			array('Date, Expira, Note, Comentario_Entrega, Comentario, Instrucciones_Especiales, Requerimiento_Preventa, Comentario_Preventa, Delivery_Direccion, Vendor_Change_Comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Cliente, Lead, Contract, Opportunity, Company, WareHouse, BackOrder_Reff, Date, Quote_DiscID, Discount, Others_Type, Others, SubTotal, TaxID, Taxes, Porcentaje_Abono, Abono_Inicial, financiamiento, Total, Agente, Actualizado, Status, Expira, Reservar_Productos, Type, SentToCustomer, SalesTerm, LeadRelated, Note, Ticket, Price_List, Pais, Fecha_Entrega, Dias_Entrega, Vendor, Tipo_Entrega, CreatedBy, Proyect, Printed, RE, AprovedBy, AprovedDate, Sucursal, Contacto_Entrega, Cargo, Departamento, Comentario_Entrega, Comentario, Destino_Carga, Instrucciones_Especiales, ReplicaCompany, Flete, Manejo, Acarreo, One_Dev_Ext, Doc_ZonaLibre, Ley, CreatedDate, Condiciones_Pago, PorVisa, NomVisa, Seguro, Incoterms, Reempaque, PorOther, NomOther, WorkFlow, WorkFlow1, WorkFlow_Step, Asignado, ShowWO, ShowCancel, ShowEdit, ShowFacturar, Departamento_Origen, Comments, StepRespaldo, Created, ShowCubicaje, ShowPeso, Updated, UpdatedBy, Notificar_a, SRI, Tipo, ShowBILL_New, Cancel_Comment, Edit_Cost, Asignado_a_compras, Tienda, Cot_Tienda, Nivelar, Titulo, Categoria, Fecha_entrega_preventa, Requerimiento_Preventa, Comentario_Preventa, Nombre_Cliente, Lost_Sale_Comment, Lost_Sale_User, Lost_Sale_Date, ExpiraDays, MargenTP, MargenT, Orden_de_Compra, NoneTaxes, Referencia, Terminate_Date, Lost_Sale_Reazon, Delivery_Direccion, DeliveryNeed, WareHouse_Session, Telefono_Cliente, DeliveryType, Instalation, Provincia, Distrito, Corregimiento, AnulateComment, Aproved_Date, Aproved_User, Delivery_Date, Delivery_Hour, Venta_Exportacion, VendedorTipo, ApplyDate, ApplyUser, Sucursal_Venta, SaveAs_From, Cambio, Email_Cliente, Vendor2, Marca, Orden_de_Venta, Tipo_de_Despacho, Total_Bultos, Consignado, Mostrar_Peso, Excursionista, Mostrar_Cubicaje, OF, Intercompany, pos, Vendor_Change_Comment, Bono, Expira_Quote', 'safe', 'on'=>'search'),
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
			'wareHouse' => array(self::BELONGS_TO, 'Warehouses', 'WareHouse'),
                        'idCustomers'=>array(self::BELONGS_TO, 'Customers', 'id'),
                     //   'idProyecto' => array(self::BELONGS_TO, 'Proyecto', 'id_proyecto'),
                    //'idCustomers'=>array(self::HAS_MANY, 'Customers', 'idquotes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Cliente' => 'Cliente',
			'Lead' => 'Lead',
			'Contract' => 'Contract',
			'Opportunity' => 'Opportunity',
			'Company' => 'Company',
			'WareHouse' => 'Ware House',
			'BackOrder_Reff' => 'Back Order Reff',
			'Date' => 'Date',
			'Quote_DiscID' => 'Quote Disc',
			'Discount' => 'Discount',
			'Others_Type' => 'Others Type',
			'Others' => 'Others',
			'SubTotal' => 'Sub Total',
			'TaxID' => 'Tax',
			'Taxes' => 'Taxes',
			'Porcentaje_Abono' => 'Porcentaje Abono',
			'Abono_Inicial' => 'Abono Inicial',
			'financiamiento' => 'Financiamiento',
			'Total' => 'Total',
			'Agente' => 'Agente',
			'Actualizado' => 'Actualizado',
			'Status' => 'Status',
			'Expira' => 'Expira',
			'Reservar_Productos' => 'Reservar Productos',
			'Type' => 'Type',
			'SentToCustomer' => 'Sent To Customer',
			'SalesTerm' => 'Sales Term',
			'LeadRelated' => 'Lead Related',
			'Note' => 'Note',
			'Ticket' => 'Ticket',
			'Price_List' => 'Price List',
			'Pais' => 'Pais',
			'Fecha_Entrega' => 'Fecha Entrega',
			'Dias_Entrega' => 'Dias Entrega',
			'Vendor' => 'Vendor',
			'Tipo_Entrega' => 'Tipo Entrega',
			'CreatedBy' => 'Created By',
			'Proyect' => 'Proyect',
			'Printed' => 'Printed',
			'RE' => 'Re',
			'AprovedBy' => 'Aproved By',
			'AprovedDate' => 'Aproved Date',
			'Sucursal' => 'Sucursal',
			'Contacto_Entrega' => 'Contacto Entrega',
			'Cargo' => 'Cargo',
			'Departamento' => 'Departamento',
			'Comentario_Entrega' => 'Comentario Entrega',
			'Comentario' => 'Comentario',
			'Destino_Carga' => 'Destino Carga',
			'Instrucciones_Especiales' => 'Instrucciones Especiales',
			'ReplicaCompany' => 'Replica Company',
			'Flete' => 'Flete',
			'Manejo' => 'Manejo',
			'Acarreo' => 'Acarreo',
			'One_Dev_Ext' => 'One Dev Ext',
			'Doc_ZonaLibre' => 'Doc Zona Libre',
			'Ley' => 'Ley',
			'CreatedDate' => 'Created Date',
			'Condiciones_Pago' => 'Condiciones Pago',
			'PorVisa' => 'Por Visa',
			'NomVisa' => 'Nom Visa',
			'Seguro' => 'Seguro',
			'Incoterms' => 'Incoterms',
			'Reempaque' => 'Reempaque',
			'PorOther' => 'Por Other',
			'NomOther' => 'Nom Other',
			'WorkFlow' => 'Work Flow',
			'WorkFlow1' => 'Work Flow1',
			'WorkFlow_Step' => 'Work Flow Step',
			'Asignado' => 'Asignado',
			'ShowWO' => 'Show Wo',
			'ShowCancel' => 'Show Cancel',
			'ShowEdit' => 'Show Edit',
			'ShowFacturar' => 'Show Facturar',
			'Departamento_Origen' => 'Departamento Origen',
			'Comments' => 'Comments',
			'StepRespaldo' => 'Step Respaldo',
			'Created' => 'Created',
			'ShowCubicaje' => 'Show Cubicaje',
			'ShowPeso' => 'Show Peso',
			'Updated' => 'Updated',
			'UpdatedBy' => 'Updated By',
			'Notificar_a' => 'Notificar A',
			'SRI' => 'Sri',
			'Tipo' => 'Tipo',
			'ShowBILL_New' => 'Show Bill New',
			'Cancel_Comment' => 'Cancel Comment',
			'Edit_Cost' => 'Edit Cost',
			'Asignado_a_compras' => 'Asignado A Compras',
			'Tienda' => 'Tienda',
			'Cot_Tienda' => 'Cot Tienda',
			'Nivelar' => 'Nivelar',
			'Titulo' => 'Titulo',
			'Categoria' => 'Categoria',
			'Fecha_entrega_preventa' => 'Fecha Entrega Preventa',
			'Requerimiento_Preventa' => 'Requerimiento Preventa',
			'Comentario_Preventa' => 'Comentario Preventa',
			'Nombre_Cliente' => 'Nombre Cliente',
			'Lost_Sale_Comment' => 'Lost Sale Comment',
			'Lost_Sale_User' => 'Lost Sale User',
			'Lost_Sale_Date' => 'Lost Sale Date',
			'ExpiraDays' => 'Expira Days',
			'MargenTP' => 'Margen Tp',
			'MargenT' => 'Margen T',
			'Orden_de_Compra' => 'Orden De Compra',
			'NoneTaxes' => 'None Taxes',
			'Referencia' => 'Referencia',
			'Terminate_Date' => 'Terminate Date',
			'Lost_Sale_Reazon' => 'Lost Sale Reazon',
			'Delivery_Direccion' => 'Delivery Direccion',
			'DeliveryNeed' => 'Delivery Need',
			'WareHouse_Session' => 'Ware House Session',
			'Telefono_Cliente' => 'Telefono Cliente',
			'DeliveryType' => 'Delivery Type',
			'Instalation' => 'Instalation',
			'Provincia' => 'Provincia',
			'Distrito' => 'Distrito',
			'Corregimiento' => 'Corregimiento',
			'AnulateComment' => 'Anulate Comment',
			'Aproved_Date' => 'Aproved Date',
			'Aproved_User' => 'Aproved User',
			'Delivery_Date' => 'Delivery Date',
			'Delivery_Hour' => 'Delivery Hour',
			'Venta_Exportacion' => 'Venta Exportacion',
			'VendedorTipo' => 'Vendedor Tipo',
			'ApplyDate' => 'Apply Date',
			'ApplyUser' => 'Apply User',
			'Sucursal_Venta' => 'Sucursal Venta',
			'SaveAs_From' => 'Save As From',
			'Cambio' => 'Cambio',
			'Email_Cliente' => 'Email Cliente',
			'Vendor2' => 'Vendor2',
			'Marca' => 'Marca',
			'Orden_de_Venta' => 'Orden De Venta',
			'Tipo_de_Despacho' => 'Tipo De Despacho',
			'Total_Bultos' => 'Total Bultos',
			'Consignado' => 'Consignado',
			'Mostrar_Peso' => 'Mostrar Peso',
			'Excursionista' => 'Excursionista',
			'Mostrar_Cubicaje' => 'Mostrar Cubicaje',
			'OF' => 'Of',
			'Intercompany' => 'Intercompany',
			'pos' => 'Pos',
			'Vendor_Change_Comment' => 'Vendor Change Comment',
			'Bono' => 'Bono',
			'Expira_Quote' => 'Expira Quote',
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
		$criteria->compare('Cliente',$this->Cliente,true);
		$criteria->compare('Lead',$this->Lead,true);
		$criteria->compare('Contract',$this->Contract,true);
		$criteria->compare('Opportunity',$this->Opportunity,true);
		$criteria->compare('Company',$this->Company,true);
		$criteria->compare('WareHouse',$this->WareHouse,true);
		$criteria->compare('BackOrder_Reff',$this->BackOrder_Reff,true);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('Quote_DiscID',$this->Quote_DiscID,true);
		$criteria->compare('Discount',$this->Discount,true);
		$criteria->compare('Others_Type',$this->Others_Type,true);
		$criteria->compare('Others',$this->Others,true);
		$criteria->compare('SubTotal',$this->SubTotal,true);
		$criteria->compare('TaxID',$this->TaxID,true);
		$criteria->compare('Taxes',$this->Taxes,true);
		$criteria->compare('Porcentaje_Abono',$this->Porcentaje_Abono,true);
		$criteria->compare('Abono_Inicial',$this->Abono_Inicial,true);
		$criteria->compare('financiamiento',$this->financiamiento,true);
		$criteria->compare('Total',$this->Total,true);
		$criteria->compare('Agente',$this->Agente,true);
		$criteria->compare('Actualizado',$this->Actualizado,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Expira',$this->Expira,true);
		$criteria->compare('Reservar_Productos',$this->Reservar_Productos,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('SentToCustomer',$this->SentToCustomer,true);
		$criteria->compare('SalesTerm',$this->SalesTerm,true);
		$criteria->compare('LeadRelated',$this->LeadRelated,true);
		$criteria->compare('Note',$this->Note,true);
		$criteria->compare('Ticket',$this->Ticket,true);
		$criteria->compare('Price_List',$this->Price_List,true);
		$criteria->compare('Pais',$this->Pais,true);
		$criteria->compare('Fecha_Entrega',$this->Fecha_Entrega,true);
		$criteria->compare('Dias_Entrega',$this->Dias_Entrega);
		$criteria->compare('Vendor',$this->Vendor,true);
		$criteria->compare('Tipo_Entrega',$this->Tipo_Entrega,true);
		$criteria->compare('CreatedBy',$this->CreatedBy,true);
		$criteria->compare('Proyect',$this->Proyect,true);
		$criteria->compare('Printed',$this->Printed,true);
		$criteria->compare('RE',$this->RE,true);
		$criteria->compare('AprovedBy',$this->AprovedBy,true);
		$criteria->compare('AprovedDate',$this->AprovedDate,true);
		$criteria->compare('Sucursal',$this->Sucursal,true);
		$criteria->compare('Contacto_Entrega',$this->Contacto_Entrega,true);
		$criteria->compare('Cargo',$this->Cargo,true);
		$criteria->compare('Departamento',$this->Departamento,true);
		$criteria->compare('Comentario_Entrega',$this->Comentario_Entrega,true);
		$criteria->compare('Comentario',$this->Comentario,true);
		$criteria->compare('Destino_Carga',$this->Destino_Carga,true);
		$criteria->compare('Instrucciones_Especiales',$this->Instrucciones_Especiales,true);
		$criteria->compare('ReplicaCompany',$this->ReplicaCompany,true);
		$criteria->compare('Flete',$this->Flete,true);
		$criteria->compare('Manejo',$this->Manejo,true);
		$criteria->compare('Acarreo',$this->Acarreo,true);
		$criteria->compare('One_Dev_Ext',$this->One_Dev_Ext,true);
		$criteria->compare('Doc_ZonaLibre',$this->Doc_ZonaLibre,true);
		$criteria->compare('Ley',$this->Ley,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('Condiciones_Pago',$this->Condiciones_Pago,true);
		$criteria->compare('PorVisa',$this->PorVisa,true);
		$criteria->compare('NomVisa',$this->NomVisa,true);
		$criteria->compare('Seguro',$this->Seguro,true);
		$criteria->compare('Incoterms',$this->Incoterms,true);
		$criteria->compare('Reempaque',$this->Reempaque,true);
		$criteria->compare('PorOther',$this->PorOther,true);
		$criteria->compare('NomOther',$this->NomOther,true);
		$criteria->compare('WorkFlow',$this->WorkFlow,true);
		$criteria->compare('WorkFlow1',$this->WorkFlow1,true);
		$criteria->compare('WorkFlow_Step',$this->WorkFlow_Step,true);
		$criteria->compare('Asignado',$this->Asignado,true);
		$criteria->compare('ShowWO',$this->ShowWO,true);
		$criteria->compare('ShowCancel',$this->ShowCancel,true);
		$criteria->compare('ShowEdit',$this->ShowEdit,true);
		$criteria->compare('ShowFacturar',$this->ShowFacturar,true);
		$criteria->compare('Departamento_Origen',$this->Departamento_Origen,true);
		$criteria->compare('Comments',$this->Comments,true);
		$criteria->compare('StepRespaldo',$this->StepRespaldo,true);
		$criteria->compare('Created',$this->Created,true);
		$criteria->compare('ShowCubicaje',$this->ShowCubicaje,true);
		$criteria->compare('ShowPeso',$this->ShowPeso,true);
		$criteria->compare('Updated',$this->Updated,true);
		$criteria->compare('UpdatedBy',$this->UpdatedBy,true);
		$criteria->compare('Notificar_a',$this->Notificar_a,true);
		$criteria->compare('SRI',$this->SRI,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('ShowBILL_New',$this->ShowBILL_New,true);
		$criteria->compare('Cancel_Comment',$this->Cancel_Comment,true);
		$criteria->compare('Edit_Cost',$this->Edit_Cost,true);
		$criteria->compare('Asignado_a_compras',$this->Asignado_a_compras,true);
		$criteria->compare('Tienda',$this->Tienda,true);
		$criteria->compare('Cot_Tienda',$this->Cot_Tienda,true);
		$criteria->compare('Nivelar',$this->Nivelar,true);
		$criteria->compare('Titulo',$this->Titulo,true);
		$criteria->compare('Categoria',$this->Categoria,true);
		$criteria->compare('Fecha_entrega_preventa',$this->Fecha_entrega_preventa,true);
		$criteria->compare('Requerimiento_Preventa',$this->Requerimiento_Preventa,true);
		$criteria->compare('Comentario_Preventa',$this->Comentario_Preventa,true);
		$criteria->compare('Nombre_Cliente',$this->Nombre_Cliente,true);
		$criteria->compare('Lost_Sale_Comment',$this->Lost_Sale_Comment,true);
		$criteria->compare('Lost_Sale_User',$this->Lost_Sale_User,true);
		$criteria->compare('Lost_Sale_Date',$this->Lost_Sale_Date,true);
		$criteria->compare('ExpiraDays',$this->ExpiraDays,true);
		$criteria->compare('MargenTP',$this->MargenTP,true);
		$criteria->compare('MargenT',$this->MargenT,true);
		$criteria->compare('Orden_de_Compra',$this->Orden_de_Compra,true);
		$criteria->compare('NoneTaxes',$this->NoneTaxes,true);
		$criteria->compare('Referencia',$this->Referencia,true);
		$criteria->compare('Terminate_Date',$this->Terminate_Date,true);
		$criteria->compare('Lost_Sale_Reazon',$this->Lost_Sale_Reazon,true);
		$criteria->compare('Delivery_Direccion',$this->Delivery_Direccion,true);
		$criteria->compare('DeliveryNeed',$this->DeliveryNeed,true);
		$criteria->compare('WareHouse_Session',$this->WareHouse_Session,true);
		$criteria->compare('Telefono_Cliente',$this->Telefono_Cliente,true);
		$criteria->compare('DeliveryType',$this->DeliveryType,true);
		$criteria->compare('Instalation',$this->Instalation,true);
		$criteria->compare('Provincia',$this->Provincia,true);
		$criteria->compare('Distrito',$this->Distrito,true);
		$criteria->compare('Corregimiento',$this->Corregimiento,true);
		$criteria->compare('AnulateComment',$this->AnulateComment,true);
		$criteria->compare('Aproved_Date',$this->Aproved_Date,true);
		$criteria->compare('Aproved_User',$this->Aproved_User,true);
		$criteria->compare('Delivery_Date',$this->Delivery_Date,true);
		$criteria->compare('Delivery_Hour',$this->Delivery_Hour,true);
		$criteria->compare('Venta_Exportacion',$this->Venta_Exportacion,true);
		$criteria->compare('VendedorTipo',$this->VendedorTipo,true);
		$criteria->compare('ApplyDate',$this->ApplyDate,true);
		$criteria->compare('ApplyUser',$this->ApplyUser,true);
		$criteria->compare('Sucursal_Venta',$this->Sucursal_Venta,true);
		$criteria->compare('SaveAs_From',$this->SaveAs_From,true);
		$criteria->compare('Cambio',$this->Cambio,true);
		$criteria->compare('Email_Cliente',$this->Email_Cliente,true);
		$criteria->compare('Vendor2',$this->Vendor2,true);
		$criteria->compare('Marca',$this->Marca,true);
		$criteria->compare('Orden_de_Venta',$this->Orden_de_Venta,true);
		$criteria->compare('Tipo_de_Despacho',$this->Tipo_de_Despacho,true);
		$criteria->compare('Total_Bultos',$this->Total_Bultos);
		$criteria->compare('Consignado',$this->Consignado,true);
		$criteria->compare('Mostrar_Peso',$this->Mostrar_Peso,true);
		$criteria->compare('Excursionista',$this->Excursionista,true);
		$criteria->compare('Mostrar_Cubicaje',$this->Mostrar_Cubicaje,true);
		$criteria->compare('OF',$this->OF,true);
		$criteria->compare('Intercompany',$this->Intercompany,true);
		$criteria->compare('pos',$this->pos,true);
		$criteria->compare('Vendor_Change_Comment',$this->Vendor_Change_Comment,true);
		$criteria->compare('Bono',$this->Bono,true);
		$criteria->compare('Expira_Quote',$this->Expira_Quote,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
	 * @return Quotes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
