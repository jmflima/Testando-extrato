<?php
namespace SONFin\Models;

use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    //Uma medida de seguran�a sefinindo os campos v�lidos
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
        //uma categoria pode estar em v�rias contas a pagar
        return $this->belongsTo(CategoryCost::class); //criando relacionamento
    }
}
