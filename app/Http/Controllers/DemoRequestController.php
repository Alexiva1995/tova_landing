<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDemoRequest;
use App\Http\Resources\DemoRequestResource;
use App\Services\DemoRequestService;
use Illuminate\Http\JsonResponse;

class DemoRequestController extends Controller
{
    /**
     * Instancia del servicio de negocio.
     */
    protected DemoRequestService $service;

    /**
     * Inyección de dependencias en el constructor.
     */
    public function __construct(DemoRequestService $service)
    {
        $this->service = $service;
    }

    /**
     * Procesa y registra la solicitud de demo.
     *
     * @param StoreDemoRequest $request
     * @return JsonResponse
     */
    public function store(StoreDemoRequest $request): JsonResponse
    {
        // El controlador es súper delgado: extrae la IP y los datos validados
        $validatedData = $request->validated();
        $ipAddress = $request->ip();

        // Delega absolutamente toda la lógica de negocio al servicio
        $result = $this->service->processDemoRequest($validatedData, $ipAddress);

        // Retorna la respuesta formateada a través del API Resource
        return (new DemoRequestResource($result['lead'], $result['redirect_url']))
            ->response()
            ->setStatusCode(201);
    }
}
