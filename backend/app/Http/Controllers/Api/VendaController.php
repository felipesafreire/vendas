<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;


class VendaController extends Controller
{

    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'valor' => 'required|min:1|numeric',
            'vendedor' => 'required'
        ], $this->getMessagesValidator());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        } else {

            $venda = Venda::create([
                'vendedor_id' => $request->input('vendedor'),
                'data_venda' => date('Y-m-d h:m:s'),
                'comissao' => (Config::get('constants.vendedor.comissao')/100) * $request->input('valor'),
                'valor_venda' => $request->input('valor')
            ]);
            if(!$venda){
                return response()->json(['errors' => "Erro ao inserir a venda."], 400);
            }else{
                $venda->vendedor = Vendedor::find($request->input('vendedor'));
                return response()->json($venda, 200);
            }

        }

    }

    private function getMessagesValidator()
    {
        return [
            "valor.required" => "Valor da venda obrigatório.",
            "valor.min" => "Valor da venda não pode ser zero.",
            "vendedor.required" => "ID do vendedor obrigatório"
        ];
    }

}
