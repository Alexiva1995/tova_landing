<?php

namespace Tests\Feature;

use App\Enums\DemoRequestStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba que un usuario pueda solicitar la demo con datos válidos.
     */
    public function test_guest_can_register_demo_request_with_valid_data(): void
    {
        // Enviar petición POST con datos válidos
        $response = $this->postJson('/demo-requests', [
            'pharmacy_name' => 'Farmacia Premium Central',
            'whatsapp' => '+34600123456',
        ]);

        // Verificar código de estado HTTP 201 (Created)
        $response->assertStatus(201);

        // Verificar estructura y contenido JSON retornado (API Resource)
        $response->assertJsonStructure([
            'data' => [
                'id',
                'pharmacy_name',
                'whatsapp',
                'status',
                'redirect_url',
                'created_at',
            ]
        ]);

        $response->assertJsonFragment([
            'pharmacy_name' => 'Farmacia Premium Central',
            'whatsapp' => '+34600123456',
            'status' => DemoRequestStatus::ACTIVE->value,
        ]);

        // Comprobar que el redireccionamiento esté personalizado
        $this->assertStringContainsString('guest=true', $response->json('data.redirect_url'));
        $this->assertStringContainsString('Farmacia+Premium+Central', $response->json('data.redirect_url'));

        // Verificar almacenamiento físico en la base de datos
        $this->assertDatabaseHas('demo_requests', [
            'pharmacy_name' => 'Farmacia Premium Central',
            'whatsapp' => '+34600123456',
            'status' => DemoRequestStatus::ACTIVE->value,
        ]);
    }

    /**
     * Prueba que la validación falle si falta el nombre de la farmacia.
     */
    public function test_demo_request_validation_fails_without_pharmacy_name(): void
    {
        $response = $this->postJson('/demo-requests', [
            'whatsapp' => '+34600123456',
        ]);

        // Verificar código de estado HTTP 422 (Unprocessable Entity)
        $response->assertStatus(422);
        $this->assertArrayHasKey('pharmacy_name', $response->json('errors'));
    }

    /**
     * Prueba que la validación falle si falta el número de WhatsApp.
     */
    public function test_demo_request_validation_fails_without_whatsapp(): void
    {
        $response = $this->postJson('/demo-requests', [
            'pharmacy_name' => 'Farmacia Central',
        ]);

        $response->assertStatus(422);
        $this->assertArrayHasKey('whatsapp', $response->json('errors'));
    }

    /**
     * Prueba que la validación falle si los campos son muy cortos.
     */
    public function test_demo_request_validation_fails_if_fields_are_too_short(): void
    {
        $response = $this->postJson('/demo-requests', [
            'pharmacy_name' => 'Fa', // Min 3
            'whatsapp' => '12345',  // Min 8
        ]);

        $response->assertStatus(422);
        $this->assertArrayHasKey('pharmacy_name', $response->json('errors'));
        $this->assertArrayHasKey('whatsapp', $response->json('errors'));
    }
}
