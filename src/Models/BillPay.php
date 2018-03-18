<?php
namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
	//Uma medida de segurança sefinindo os campos válidos
	//Mass Assignment
	protected $fillable = [
		'date_lance',
		'name',
		'value',
		'user_id',
		'category_cost_id'
	];
	
	public function categoryCost()
	{
		//uma categoria pode estar em várias contas a pagar
		return $this->belongsTo(CategoryCost::class); //criando relacionamento
	}
}