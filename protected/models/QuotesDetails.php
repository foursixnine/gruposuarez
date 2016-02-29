<?php

/**
 * This is the model class for table "quotes_details".
 *
 * The followings are the available columns in table 'quotes_details':
 * @property integer $id
 * @property string $Bill
 * @property string $Codigo
 * @property string $Descripcion
 * @property string $Unidades
 * @property string $Precio_Unitario
 * @property string $Abono_Minimo
 * @property string $Precio_Solicitado
 * @property string $Total
 * @property string $Discount
 * @property string $DiscountFactor
 * @property string $Wh_line
 * @property string $Task
 * @property string $Margen
 * @property string $Costo
 * @property string $Margen_Por
 * @property string $Codmask
 * @property string $IdProd_new
 * @property string $Cubicaje
 * @property string $Peso
 * @property string $imagen
 * @property string $Revers_Units
 * @property string $InsertedDate
 * @property string $InsertedBy
 * @property string $UoM
 * @property string $UoM_Unidades
 * @property string $UoM_Factor
 * @property string $WareHouse
 * @property string $Product_Bill_ID
 * @property integer $Linea
 * @property string $TaxID
 * @property string $TaxFactor
 * @property string $TaxValue
 * @property string $DiscountId
 * @property string $DiscountMin
 * @property string $DiscountMax
 * @property string $Status
 * @property string $Comment
 * @property string $TotalSinDescuento
 * @property string $DiscF_money
 * @property string $Success
 * @property string $Dimencion_Quantity
 * @property string $Dimencion_LP
 * @property string $Dimencion_LM
 * @property string $Dimencion_AP
 * @property string $Dimencion_AM
 * @property string $Dimencion_Grosor
 * @property string $Dimencion_QuantityTotal
 * @property string $Lost_Sale_Reazon
 * @property string $Proyect
 * @property string $Aproved_Date
 * @property string $Aproved_User
 * @property string $PriceList
 * @property string $DiscountExtraordinaryUser
 * @property string $Requiere_Medidas
 * @property string $Observacion
 * @property string $ApplyDate
 * @property string $ApplyUser
 * @property string $Promoid
 * @property string $RealPrice
 * @property string $Seriales
 * @property string $house
 * @property string $model
 * @property string $project
 * @property string $promotion_prop
 * @property string $DocType
 * @property string $Abono
 * @property string $Abono_money
 * @property string $Promotion_id
 */
class QuotesDetails extends GActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enx_suarez.quotes_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Bill, Codigo, Descripcion, Unidades, Precio_Unitario, Abono_Minimo, Precio_Solicitado, Total, Discount, DiscountFactor, Margen, Costo, Margen_Por, imagen, Revers_Units, InsertedDate, InsertedBy, UoM, UoM_Unidades, UoM_Factor, WareHouse, Product_Bill_ID, Linea, TaxID, TaxFactor, TaxValue, DiscountId, DiscountMin, DiscountMax, Comment, TotalSinDescuento, DiscF_money, Success, Dimencion_Quantity, Dimencion_LP, Dimencion_LM, Dimencion_AP, Dimencion_AM, Dimencion_Grosor, Dimencion_QuantityTotal, Lost_Sale_Reazon, Proyect, Aproved_Date, Aproved_User, PriceList, DiscountExtraordinaryUser, Observacion, ApplyDate, ApplyUser, Promoid, RealPrice, Seriales', 'required'),
			array('Linea', 'numerical', 'integerOnly'=>true),
			array('Bill, Unidades, Precio_Unitario, Abono_Minimo, Precio_Solicitado, Total, Discount, DiscountFactor, Margen, Costo, Margen_Por, Cubicaje, Peso, Revers_Units, UoM_Unidades, UoM_Factor, TaxID, TaxFactor, TaxValue, DiscountMin, DiscountMax, TotalSinDescuento, DiscF_money, Success, Dimencion_Quantity, Dimencion_LP, Dimencion_LM, Dimencion_AP, Dimencion_AM, Dimencion_Grosor, Dimencion_QuantityTotal, Proyect, RealPrice, DocType, Abono, Abono_money, Promotion_id', 'length', 'max'=>22),
			array('Codigo, Codmask, DiscountId, Status, Aproved_User, DiscountExtraordinaryUser, ApplyUser, Promoid, house, model, project', 'length', 'max'=>50),
			array('Wh_line, Task, InsertedBy, WareHouse', 'length', 'max'=>100),
			array('IdProd_new', 'length', 'max'=>20),
			array('UoM', 'length', 'max'=>25),
			array('Product_Bill_ID', 'length', 'max'=>30),
			array('Lost_Sale_Reazon', 'length', 'max'=>150),
			array('PriceList', 'length', 'max'=>80),
			array('Requiere_Medidas', 'length', 'max'=>3),
			array('Seriales', 'length', 'max'=>200),
			array('promotion_prop', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Bill, Codigo, Descripcion, Unidades, Precio_Unitario, Abono_Minimo, Precio_Solicitado, Total, Discount, DiscountFactor, Wh_line, Task, Margen, Costo, Margen_Por, Codmask, IdProd_new, Cubicaje, Peso, imagen, Revers_Units, InsertedDate, InsertedBy, UoM, UoM_Unidades, UoM_Factor, WareHouse, Product_Bill_ID, Linea, TaxID, TaxFactor, TaxValue, DiscountId, DiscountMin, DiscountMax, Status, Comment, TotalSinDescuento, DiscF_money, Success, Dimencion_Quantity, Dimencion_LP, Dimencion_LM, Dimencion_AP, Dimencion_AM, Dimencion_Grosor, Dimencion_QuantityTotal, Lost_Sale_Reazon, Proyect, Aproved_Date, Aproved_User, PriceList, DiscountExtraordinaryUser, Requiere_Medidas, Observacion, ApplyDate, ApplyUser, Promoid, RealPrice, Seriales, house, model, project, promotion_prop, DocType, Abono, Abono_money, Promotion_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'Bill' => 'Bill',
			'Codigo' => 'Codigo',
			'Descripcion' => 'Descripcion',
			'Unidades' => 'Unidades',
			'Precio_Unitario' => 'Precio Unitario',
			'Abono_Minimo' => 'Abono Minimo',
			'Precio_Solicitado' => 'Precio Solicitado',
			'Total' => 'Total',
			'Discount' => 'Discount',
			'DiscountFactor' => 'Discount Factor',
			'Wh_line' => 'Wh Line',
			'Task' => 'Task',
			'Margen' => 'Margen',
			'Costo' => 'Costo',
			'Margen_Por' => 'Margen Por',
			'Codmask' => 'Codmask',
			'IdProd_new' => 'Id Prod New',
			'Cubicaje' => 'Cubicaje',
			'Peso' => 'Peso',
			'imagen' => 'Imagen',
			'Revers_Units' => 'Revers Units',
			'InsertedDate' => 'Inserted Date',
			'InsertedBy' => 'Inserted By',
			'UoM' => 'Uo M',
			'UoM_Unidades' => 'Uo M Unidades',
			'UoM_Factor' => 'Uo M Factor',
			'WareHouse' => 'Ware House',
			'Product_Bill_ID' => 'Product Bill',
			'Linea' => 'Linea',
			'TaxID' => 'Tax',
			'TaxFactor' => 'Tax Factor',
			'TaxValue' => 'Tax Value',
			'DiscountId' => 'Discount',
			'DiscountMin' => 'Discount Min',
			'DiscountMax' => 'Discount Max',
			'Status' => 'ACTIVO',
			'Comment' => 'Comment',
			'TotalSinDescuento' => 'Total Sin Descuento',
			'DiscF_money' => 'Disc F Money',
			'Success' => 'Success',
			'Dimencion_Quantity' => 'Dimencion Quantity',
			'Dimencion_LP' => 'Dimencion Lp',
			'Dimencion_LM' => 'Dimencion Lm',
			'Dimencion_AP' => 'Dimencion Ap',
			'Dimencion_AM' => 'Dimencion Am',
			'Dimencion_Grosor' => 'Dimencion Grosor',
			'Dimencion_QuantityTotal' => 'Dimencion Quantity Total',
			'Lost_Sale_Reazon' => 'Lost Sale Reazon',
			'Proyect' => 'Proyect',
			'Aproved_Date' => 'Aproved Date',
			'Aproved_User' => 'Aproved User',
			'PriceList' => 'Price List',
			'DiscountExtraordinaryUser' => 'Discount Extraordinary User',
			'Requiere_Medidas' => 'Requiere Medidas',
			'Observacion' => 'Observacion',
			'ApplyDate' => 'Apply Date',
			'ApplyUser' => 'Apply User',
			'Promoid' => 'Promoid',
			'RealPrice' => 'Real Price',
			'Seriales' => 'Seriales',
			'house' => 'House',
			'model' => 'Model',
			'project' => 'Project',
			'promotion_prop' => 'Promotion Prop',
			'DocType' => 'Doc Type',
			'Abono' => 'Abono',
			'Abono_money' => 'Abono Money',
			'Promotion_id' => 'Promotion',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('Bill',$this->Bill,true);
		$criteria->compare('Codigo',$this->Codigo,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Unidades',$this->Unidades,true);
		$criteria->compare('Precio_Unitario',$this->Precio_Unitario,true);
		$criteria->compare('Abono_Minimo',$this->Abono_Minimo,true);
		$criteria->compare('Precio_Solicitado',$this->Precio_Solicitado,true);
		$criteria->compare('Total',$this->Total,true);
		$criteria->compare('Discount',$this->Discount,true);
		$criteria->compare('DiscountFactor',$this->DiscountFactor,true);
		$criteria->compare('Wh_line',$this->Wh_line,true);
		$criteria->compare('Task',$this->Task,true);
		$criteria->compare('Margen',$this->Margen,true);
		$criteria->compare('Costo',$this->Costo,true);
		$criteria->compare('Margen_Por',$this->Margen_Por,true);
		$criteria->compare('Codmask',$this->Codmask,true);
		$criteria->compare('IdProd_new',$this->IdProd_new,true);
		$criteria->compare('Cubicaje',$this->Cubicaje,true);
		$criteria->compare('Peso',$this->Peso,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('Revers_Units',$this->Revers_Units,true);
		$criteria->compare('InsertedDate',$this->InsertedDate,true);
		$criteria->compare('InsertedBy',$this->InsertedBy,true);
		$criteria->compare('UoM',$this->UoM,true);
		$criteria->compare('UoM_Unidades',$this->UoM_Unidades,true);
		$criteria->compare('UoM_Factor',$this->UoM_Factor,true);
		$criteria->compare('WareHouse',$this->WareHouse,true);
		$criteria->compare('Product_Bill_ID',$this->Product_Bill_ID,true);
		$criteria->compare('Linea',$this->Linea);
		$criteria->compare('TaxID',$this->TaxID,true);
		$criteria->compare('TaxFactor',$this->TaxFactor,true);
		$criteria->compare('TaxValue',$this->TaxValue,true);
		$criteria->compare('DiscountId',$this->DiscountId,true);
		$criteria->compare('DiscountMin',$this->DiscountMin,true);
		$criteria->compare('DiscountMax',$this->DiscountMax,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('TotalSinDescuento',$this->TotalSinDescuento,true);
		$criteria->compare('DiscF_money',$this->DiscF_money,true);
		$criteria->compare('Success',$this->Success,true);
		$criteria->compare('Dimencion_Quantity',$this->Dimencion_Quantity,true);
		$criteria->compare('Dimencion_LP',$this->Dimencion_LP,true);
		$criteria->compare('Dimencion_LM',$this->Dimencion_LM,true);
		$criteria->compare('Dimencion_AP',$this->Dimencion_AP,true);
		$criteria->compare('Dimencion_AM',$this->Dimencion_AM,true);
		$criteria->compare('Dimencion_Grosor',$this->Dimencion_Grosor,true);
		$criteria->compare('Dimencion_QuantityTotal',$this->Dimencion_QuantityTotal,true);
		$criteria->compare('Lost_Sale_Reazon',$this->Lost_Sale_Reazon,true);
		$criteria->compare('Proyect',$this->Proyect,true);
		$criteria->compare('Aproved_Date',$this->Aproved_Date,true);
		$criteria->compare('Aproved_User',$this->Aproved_User,true);
		$criteria->compare('PriceList',$this->PriceList,true);
		$criteria->compare('DiscountExtraordinaryUser',$this->DiscountExtraordinaryUser,true);
		$criteria->compare('Requiere_Medidas',$this->Requiere_Medidas,true);
		$criteria->compare('Observacion',$this->Observacion,true);
		$criteria->compare('ApplyDate',$this->ApplyDate,true);
		$criteria->compare('ApplyUser',$this->ApplyUser,true);
		$criteria->compare('Promoid',$this->Promoid,true);
		$criteria->compare('RealPrice',$this->RealPrice,true);
		$criteria->compare('Seriales',$this->Seriales,true);
		$criteria->compare('house',$this->house,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('project',$this->project,true);
		$criteria->compare('promotion_prop',$this->promotion_prop,true);
		$criteria->compare('DocType',$this->DocType,true);
		$criteria->compare('Abono',$this->Abono,true);
		$criteria->compare('Abono_money',$this->Abono_money,true);
		$criteria->compare('Promotion_id',$this->Promotion_id,true);

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
	 * @return QuotesDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
