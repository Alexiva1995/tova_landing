<?php

namespace App\Enums;

enum DemoRequestStatus: string
{
    case PENDING   = 'pending';
    case ACTIVE    = 'active';
    case COMPLETED = 'completed';

    /**
     * Retorna la etiqueta legible del estado para vistas y correos.
     */
    public function label(): string
    {
        return match($this) {
            self::PENDING   => 'Pendiente',
            self::ACTIVE    => 'Activo',
            self::COMPLETED => 'Completado',
        };
    }
}
