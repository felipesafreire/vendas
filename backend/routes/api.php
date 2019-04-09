<?php

//Vendedor
Route::post('vendedor', 'Api\VendedorController@salvar');
Route::get('vendedor/todos', 'Api\VendedorController@todos');
Route::get('vendedor/{idVendedor}/vendas', 'Api\VendedorController@vendas');

//Venda
Route::post('venda', 'Api\VendaController@salvar');


