<?php

Route::get('/', function () {
    return response()->json(['message' => 'Vendas API', 'status' => 'OK']);
});

Route::get('/email', function (){
    return new App\Mail\EnviaEmailTotalDiarioVendas();
});