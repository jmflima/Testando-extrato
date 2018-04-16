<?php
namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;

class BillReceive extends Model
{
    //Uma medida de seguran�a sefinindo os campos v�lidos
    //Mass Assignment
    protected $fillable = [
    'date_lance',
    'name',
    'value',
    'user_id'
    ];
}
