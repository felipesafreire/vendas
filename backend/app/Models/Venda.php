<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public $timestamps = false;
    protected $table = 'vendas';
    protected $fillable = ['id', 'vendedor_id', 'comissao', 'data_venda', 'valor_venda'];
    protected $dates = ['data_venda'];
    protected $casts = [
        'data_venda' => 'datetime:d/m/Y h:m:s',
        'comissao' => 'float',
        'valor_venda' => 'float'
    ];


    public function vendedor()
    {
        return $this->belongsTo('App\Models\Vendedor');
    }


}
