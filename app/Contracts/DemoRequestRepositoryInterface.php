<?php

namespace App\Contracts;

use App\Models\DemoRequest;

interface DemoRequestRepositoryInterface
{
    /**
     * Crea un nuevo registro de solicitud de demo.
     *
     * @param array $data
     * @return DemoRequest
     */
    public function create(array $data): DemoRequest;
}
