<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DemoRequestResource extends JsonResource
{
    /**
     * Variable para almacenar la URL de redirección calculada en el servicio.
     */
    protected ?string $redirectUrl = null;

    /**
     * Constructor extendido para inyectar la redirectUrl si existe.
     */
    public function __construct($resource, ?string $redirectUrl = null)
    {
        parent::__construct($resource);
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Transforma el recurso en un array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pharmacy_name' => $this->pharmacy_name,
            'whatsapp' => $this->whatsapp,
            'status' => $this->status->value,
            'redirect_url' => $this->redirectUrl,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
