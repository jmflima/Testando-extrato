<?php

namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCost extends Model
{
	//Uma medida de segurança sefinindo os campos válidos
	//Mass Assignment
	protected $fillable = [
		'name',
		'user_id'
	];
}