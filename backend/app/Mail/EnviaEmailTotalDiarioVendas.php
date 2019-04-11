<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class EnviaEmailTotalDiarioVendas extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $total = DB::table('vendas')
            ->whereRaw('cast(data_venda as date) = ' . date('Y-m-d'))
            ->sum('valor_venda');
        return $this->from('luisfelipesafreire@hotmail.com')
            ->view('email')
            ->with([
                'total' => number_format($total, 2, '.', ','),
            ]);
    }

}
