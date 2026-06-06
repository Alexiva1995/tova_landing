<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Lead — TOVA</title>
    <style>
        /* Estilos inline para máxima compatibilidad con clientes de correo */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f0f2f5;
            padding: 40px 20px;
            color: #1a1a2e;
        }
        .wrapper {
            max-width: 560px;
            margin: 0 auto;
        }
        .header {
            background: linear-gradient(135deg, #7A0099 0%, #E20074 100%);
            border-radius: 16px 16px 0 0;
            padding: 32px 36px;
            text-align: center;
        }
        .header-logo {
            font-size: 28px;
            font-weight: 900;
            color: #ffffff;
            letter-spacing: -1px;
        }
        .header-logo span {
            opacity: 0.7;
            font-weight: 400;
            font-size: 14px;
            display: block;
            margin-top: 4px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .badge-new {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 4px 12px;
            border-radius: 20px;
            margin-top: 16px;
        }
        .body {
            background: #ffffff;
            padding: 36px;
            border-left: 1px solid #e8eaf0;
            border-right: 1px solid #e8eaf0;
        }
        .alert-title {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 6px;
        }
        .alert-subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 28px;
        }
        .lead-card {
            background: #f8f9fc;
            border: 1px solid #e8eaf0;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
        }
        .lead-card-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #9ca3af;
            margin-bottom: 16px;
        }
        .lead-field {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #e8eaf0;
        }
        .lead-field:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .lead-field:first-of-type {
            padding-top: 0;
        }
        .field-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: linear-gradient(135deg, rgba(122, 0, 153, 0.1), rgba(226, 0, 116, 0.1));
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 18px;
        }
        .field-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9ca3af;
            margin-bottom: 2px;
        }
        .field-value {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
        }
        .cta-section {
            text-align: center;
            margin: 28px 0 8px;
        }
        .cta-btn {
            display: inline-block;
            background: linear-gradient(135deg, #7A0099, #E20074);
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 10px;
            letter-spacing: 0.3px;
        }
        .meta-row {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }
        .meta-pill {
            background: #f0f2f5;
            border-radius: 8px;
            padding: 10px 14px;
            flex: 1;
        }
        .meta-pill-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #9ca3af;
            margin-bottom: 3px;
        }
        .meta-pill-value {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            word-break: break-all;
        }
        .footer-bar {
            background: #1a1a2e;
            border-radius: 0 0 16px 16px;
            padding: 20px 36px;
            text-align: center;
        }
        .footer-bar p {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4);
        }
        .footer-bar strong {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Cabecera con gradiente de marca TOVA -->
        <div class="header">
            <div class="header-logo">
                TOVA
                <span>ERP Farmacéutico</span>
            </div>
            <div class="badge-new">🚀 Nuevo Lead Recibido</div>
        </div>

        <!-- Cuerpo principal del correo -->
        <div class="body">
            <p class="alert-title">¡Alerta de Lead!</p>
            <p class="alert-subtitle">
                Una farmacia acaba de solicitar una demostración de TOVA. Contáctalos pronto para maximizar la conversión.
            </p>

            <!-- Tarjeta con datos del lead -->
            <div class="lead-card">
                <p class="lead-card-title">Datos del Prospecto</p>

                <div class="lead-field">
                    <div class="field-icon">🏥</div>
                    <div>
                        <p class="field-label">Nombre de la Farmacia</p>
                        <p class="field-value">{{ $lead->pharmacy_name }}</p>
                    </div>
                </div>

                <div class="lead-field">
                    <div class="field-icon">📱</div>
                    <div>
                        <p class="field-label">WhatsApp de Contacto</p>
                        <p class="field-value">{{ $lead->whatsapp }}</p>
                    </div>
                </div>
            </div>

            <!-- Metadatos técnicos del lead -->
            <div class="meta-row">
                <div class="meta-pill">
                    <p class="meta-pill-label">📍 IP de Origen</p>
                    <p class="meta-pill-value">{{ $lead->ip_address ?? 'No disponible' }}</p>
                </div>
                <div class="meta-pill">
                    <p class="meta-pill-label">🕐 Fecha y Hora</p>
                    <p class="meta-pill-value">{{ $lead->created_at->setTimezone('America/Caracas')->format('d/m/Y H:i') }} VET</p>
                </div>
                <div class="meta-pill">
                    <p class="meta-pill-label">📊 Estado</p>
                    <p class="meta-pill-value">{{ $lead->status->label() }}</p>
                </div>
            </div>

            <!-- CTA para contactar al lead directamente por WhatsApp -->
            <div class="cta-section">
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $lead->whatsapp) }}?text={{ urlencode('Hola, soy del equipo TOVA. Vi tu solicitud de demo para tu farmacia ' . $lead->pharmacy_name . '. ¿Cuándo podemos hablar?') }}"
                   class="cta-btn">
                    📲 Contactar por WhatsApp
                </a>
            </div>
        </div>

        <!-- Footer de la empresa -->
        <div class="footer-bar">
            <p>
                Este correo fue generado automáticamente por <strong>TOVA ERP Farmacéutico</strong>.<br>
                No responder a este mensaje.
            </p>
        </div>
    </div>
</body>
</html>
