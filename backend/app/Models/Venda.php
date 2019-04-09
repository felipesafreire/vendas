<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['id', 'vendedor_id', 'comissao', 'data_venda', 'valor_venda'];
    protected $dates = ['data_venda'];
    public $timestamps = false;
    protected $table = 'vendas';

    public function vendedor()
    {
        return $this->belongsTo('App\Models\Vendedor');
    }
}
