<?php

namespace App\Console\Commands;

use App\Mail\CobroMensualidadMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendCobroCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tova:send-cobro {email : El correo de destino}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correo de cobro de mensualidad a un cliente';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recipient = $this->argument('email');

        $data = [
            'site_url' => 'https://victoriadoreshop.com/',
            'site_name' => 'victoriadoreshop.com',
            'period' => '21/08/2026 al 20/09/2026',
            'usd_amount' => 49,
            'rate' => 3300,
            'cop_amount' => 49 * 3300,
            'banco_cuenta' => '91201530453',
            'banco_titular' => 'Estefanny Torrado',
            'banco_cc' => '1148456331',
            'binance_email' => 'Alexisjose95@gmail.com',
        ];

        $this->info("Enviando correo de cobro a: {$recipient}...");

        Mail::to($recipient)->send(new CobroMensualidadMail($data));

        $this->info('¡Correo enviado con éxito!');
        return Command::SUCCESS;
    }
}
