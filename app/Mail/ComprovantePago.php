<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComprovantePago extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;

    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function build()
    {
        return $this->markdown('emails.comprovante-pago')
        ->subject('Comprovante de Pagamento')
            ->attachData($this->dados['pdf'], 'comprovante.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
