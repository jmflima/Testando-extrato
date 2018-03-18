<?php
namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;

class BillReceive extends Model
{
	//Uma medida de segurança sefinindo os campos válidos
	//Mass Assignment
	protected $fillable = [
		'date_lance',
		'name',
		'value',
		'user_id'
	];
}