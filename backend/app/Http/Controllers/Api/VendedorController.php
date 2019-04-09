<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;

class VendedorController extends Controller
{

    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|email',
        ], $this->getMessagesValidator());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        } else {
            $vendedor = Vendedor::create([
                'nome' => $request->input('nome'),
                'email' => $request->input('email')
            ]);
            return response()->json($vendedor, 200);
        }
    }

    public function vendas($idVendedor)
    {
        if (empty($idVendedor)) {
            return response()->json(['errors' => ['ID do vendedor obrigatório']], 400);
        } else {
            $vendas = Vendedor::with('vendas')->first();
            return response()->json($vendas, 200);
        }
    }

    public function todos()
    {
        $vendedores = Vendedor::all();
        foreach ($vendedores as $key => $vendedor):
            $vendedor['comissao'] = Config::get('constants.vendedor.comissao');
        endforeach;
        return response()->json($vendedores, 200);
    }

    private function getMessagesValidator()
    {
        return [
            "nome.required" => "Nome obrigatório.",
            "email.required" => "E-mail obrigatório.",
            "email.email" => "E-mail inválido.",
        ];
    }

}
