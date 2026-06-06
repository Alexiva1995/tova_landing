<?php

namespace App\Services;

use App\Contracts\DemoRequestRepositoryInterface;
use App\Enums\DemoRequestStatus;
use App\Mail\NuevoLeadMail;
use App\Models\DemoRequest;
use Illuminate\Support\Facades\Mail;

class DemoRequestService
{
    /**
     * Instancia del repositorio de solicitudes de demo.
     */
    protected DemoRequestRepositoryInterface $repository;

    /**
     * Inyección de dependencias para el constructor.
     */
    public function __construct(DemoRequestRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Procesa la solicitud de demo, registra el lead y genera la redirección.
     *
     * @param array $data
     * @param string|null $ipAddress
     * @return array
     */
    public function processDemoRequest(array $data, ?string $ipAddress = null): array
    {
        // Preparar datos para persistencia
        $payload = [
            'pharmacy_name' => $data['pharmacy_name'],
            'whatsapp'      => $data['whatsapp'],
            'status'        => DemoRequestStatus::ACTIVE,
            'ip_address'    => $ipAddress,
        ];

        // Guardar lead usando el repositorio
        $lead = $this->repository->create($payload);

        // Notificar al equipo TOVA con un correo de alerta del nuevo lead
        $notifyAddress = config('mail.lead_notify', env('MAIL_LEAD_NOTIFY', 'alexisjoseva95@gmail.com'));
        Mail::to($notifyAddress)->send(new NuevoLeadMail($lead));

        // Generar la URL de la instancia demo de TOVA
        $demoBaseUrl   = 'https://demo.tova.io';
        $redirectUrl   = $demoBaseUrl . '?guest=true&pharmacy=' . urlencode($lead->pharmacy_name);

        return [
            'lead'         => $lead,
            'redirect_url' => $redirectUrl,
        ];
    }
}
