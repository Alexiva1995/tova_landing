<?php

namespace App\Mail;

use App\Models\DemoRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevoLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * El lead recién registrado.
     */
    public DemoRequest $lead;

    /**
     * Constructor del Mailable con inyección del modelo del lead.
     */
    public function __construct(DemoRequest $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Configuración del sobre del correo: asunto y remitente.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🚀 Nuevo Lead TOVA — ' . $this->lead->pharmacy_name,
        );
    }

    /**
     * Contenido del correo: vista Blade dedicada al lead.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.nuevo-lead',
        );
    }

    /**
     * Sin adjuntos.
     */
    public function attachments(): array
    {
        return [];
    }
}
