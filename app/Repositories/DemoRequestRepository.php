<?php

namespace App\Repositories;

use App\Contracts\DemoRequestRepositoryInterface;
use App\Models\DemoRequest;

class DemoRequestRepository implements DemoRequestRepositoryInterface
{
    /**
     * Crea un nuevo registro de solicitud de demo.
     *
     * @param array $data
     * @return DemoRequest
     */
    public function create(array $data): DemoRequest
    {
        return DemoRequest::create($data);
    }
}
