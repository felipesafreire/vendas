<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = ['id', 'nome', 'email'];
    public $timestamps = false;
    protected $table = "vendedores";

    public function vendas(){
        return $this->hasMany('App\Models\Venda');
    }

}
