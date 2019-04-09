<?php

Route::get('/', function () {
    return response()->json(['message' => 'Vendas API', 'status' => 'OK']);
});