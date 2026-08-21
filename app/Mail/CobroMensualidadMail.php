<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CobroMensualidadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Datos del cobro.
     */
    public array $data;

    /**
     * Constructor del Mailable.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Configuración del sobre del correo: asunto.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🔔 Renovación de Mensualidad — ' . ($this->data['site'] ?? 'TOVA'),
        );
    }

    /**
     * Contenido del correo: vista Blade.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.cobro-mensualidad',
        );
    }

    /**
     * Adjuntos.
     */
    public function attachments(): array
    {
        return [];
    }
}
