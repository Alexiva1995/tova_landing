<script setup>
import { ref } from 'vue';

const activeSocio = ref('droguerias');
</script>

<template>
    <div>

        <!-- Navbar -->
        <header class="navbar navbar-scrolled">
            <div class="container navbar-container">
                <a href="/" class="brand">
                    <img class="logo-svg" src="/logo/logo-tova-software-farmacias.svg" alt="TOVA ERP">
                </a>
                <div class="nav-actions">
                    <a href="/" class="btn btn-outline" style="padding: 10px 24px; font-size: 0.9rem;">← Volver al inicio</a>
                </div>
            </div>
        </header>

        <!-- ── A. HERO ────────────────────────────────────────────── -->
        <section class="hero" style="padding-top: 150px;">
            <div class="container hero-grid">
                <div class="hero-content">
                    <span class="badge">Propuesta de Alianza Estratégica</span>
                    <h1 class="hero-title">
                        El ERP farmacéutico que ya opera.<br>
                        <span class="text-gradient">Construyámoslo juntos.</span>
                    </h1>
                    <p class="hero-subtext">
                        Tova ERP es un producto de <strong>Valdusoft</strong> — empresa de desarrollo con 11 años operando en Colombia, Perú, Bolivia y México. 35 módulos especializados, inteligencia artificial nativa y soporte triple divisa.
                    </p>
                    <div class="hero-ctas">
                        <a href="mailto:alexisjoseva95@gmail.com" class="btn btn-primary">
                            Hablemos de una alianza
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                    </div>
                    <div class="hero-ctas" style="margin-top: 0; gap: 10px; flex-wrap: wrap;">
                        <span class="tech-tag">
                            <span style="width:8px;height:8px;border-radius:50%;background:#27C93F;display:inline-block;box-shadow:0 0 6px #27C93F;"></span>
                            Droguerías y Distribuidores
                        </span>
                        <span class="tech-tag">
                            <span style="width:8px;height:8px;border-radius:50%;background:#4B8EF5;display:inline-block;box-shadow:0 0 6px #4B8EF5;"></span>
                            Laboratorios
                        </span>
                        <span class="tech-tag">
                            <span style="width:8px;height:8px;border-radius:50%;background:var(--color-primary);display:inline-block;box-shadow:0 0 6px var(--color-primary);"></span>
                            Socios Comerciales
                        </span>
                    </div>
                </div>

                <!-- Visual: métricas clave -->
                <div class="hero-visual">
                    <div style="display:flex;flex-direction:column;gap:16px;width:100%;">
                        <div class="pain-stats" style="grid-template-columns:1fr 1fr;gap:16px;">
                            <div class="stat-box" style="padding:24px;">
                                <div class="stat-number" style="font-size:2.8rem;">3,000<span style="font-size:1.8rem;">+</span></div>
                                <div class="stat-label">Farmacias digitalizables en Venezuela</div>
                            </div>
                            <div class="stat-box" style="padding:24px;">
                                <div class="stat-number" style="font-size:2.8rem;">35</div>
                                <div class="stat-label">Módulos especializados en farmacia</div>
                            </div>
                            <div class="stat-box" style="padding:24px;">
                                <div class="stat-number" style="font-size:2.8rem;">11</div>
                                <div class="stat-label">Años de Valdusoft en el mercado</div>
                            </div>
                            <div class="stat-box" style="padding:24px;">
                                <div class="stat-number" style="font-size:2.8rem;">6</div>
                                <div class="stat-label">Droguerías integradas en producción</div>
                            </div>
                        </div>
                        <div style="background:rgba(226,0,116,0.04);border:1px solid rgba(226,0,116,0.15);border-radius:16px;padding:20px 24px;">
                            <p style="font-size:0.88rem;color:#4A5073;line-height:1.6;">
                                <strong style="color:var(--color-primary);">Táchira = laboratorio único.</strong> La dinámica fronteriza con Colombia genera precios en tres monedas, arbitraje de inventario y clientes que cruzan diariamente. Tova fue construido para esa realidad.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── B. TRES TIPOS DE SOCIO ─────────────────────────────── -->
        <section class="pilares" style="background:var(--color-white);">
            <div class="container">
                <div class="section-header">
                    <span class="badge">¿Con quién quieres construir esto?</span>
                    <h2 class="section-title">Elige tu perfil de alianza</h2>
                    <p class="section-subtext">Cada socio aporta lo que mejor sabe hacer. La propuesta de valor cambia según tu posición en el ecosistema farmacéutico.</p>
                </div>

                <!-- Tabs de selección -->
                <div class="alianzas-tabs">
                    <button
                        :class="['alianzas-tab', { 'alianzas-tab-active': activeSocio === 'droguerias' }]"
                        @click="activeSocio = 'droguerias'"
                    >Droguerías y Distribuidores</button>
                    <button
                        :class="['alianzas-tab', { 'alianzas-tab-active': activeSocio === 'laboratorios' }]"
                        @click="activeSocio = 'laboratorios'"
                    >Laboratorios</button>
                    <button
                        :class="['alianzas-tab', { 'alianzas-tab-active': activeSocio === 'comerciales' }]"
                        @click="activeSocio = 'comerciales'"
                    >Socios Comerciales</button>
                </div>

                <!-- Panel: Droguerías -->
                <div v-if="activeSocio === 'droguerias'" class="alianzas-panel">
                    <div class="especialista-grid">
                        <div class="especialista-content">
                            <span class="badge">Droguerías y Distribuidores</span>
                            <h2 class="section-title" style="text-align:left;margin-bottom:8px;">Te digitalizamos.<br>Sin que pongas un centavo.</h2>
                            <p class="section-subtext" style="text-align:left;margin:0 0 24px;">
                                Adaptamos una versión de Tova a los procesos exactos de tu droguería — sin costo, sin riesgo. Operativa en menos de 30 días. A cambio, solo necesitamos que abras dos puertas: tus farmacias clientes y un evento conjunto.
                            </p>
                            <div class="especialista-features">
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Implementación en 22–30 días</h4>
                                    <p class="esp-feature-text">Nos encargamos de los procesos, la configuración y la capacitación. Tu equipo opera el sistema desde el primer día sin curvas largas de aprendizaje.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Pedidos automáticos desde tu red</h4>
                                    <p class="esp-feature-text">Las farmacias que adoptan Tova generan pedidos estructurados directo a tu sistema — EDI, FTP o API según tu infraestructura actual. Sin Excel, sin llamadas.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Sin costo los primeros 6 meses</h4>
                                    <p class="esp-feature-text">Tienes 6 meses para validar el sistema dentro de tu operación antes de que entre en vigor la licencia. Cero riesgo financiero en la adopción.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Parte del ecosistema Tova</h4>
                                    <p class="esp-feature-text">Tu droguería aparece como integración oficial en el ERP de cada farmacia de tu red. Tus precios y catálogos, nativos en el sistema que usan tus clientes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="especialista-quote-card">
                            <span class="quote-icon">"</span>
                            <div style="display:flex;flex-direction:column;gap:16px;position:relative;z-index:1;">
                                <div>
                                    <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;opacity:0.7;margin-bottom:6px;">Lo que pedimos a cambio</div>
                                    <div style="font-size:1rem;font-weight:700;">Exclusividad de integración</div>
                                    <p style="font-size:0.82rem;opacity:0.85;margin-top:6px;line-height:1.5;">La integración que construimos juntos no se cede a otros softwares durante 12 meses desde la firma del acuerdo.</p>
                                </div>
                                <div style="border-top:1px solid rgba(255,255,255,0.2);padding-top:16px;">
                                    <div style="font-size:1rem;font-weight:700;">Acceso a tu red + eventos</div>
                                    <p style="font-size:0.82rem;opacity:0.85;margin-top:6px;line-height:1.5;">Presentaciones a las farmacias de tu cartera y al menos un evento conjunto por semestre para mostrar el sistema.</p>
                                </div>
                                <div style="border-top:1px solid rgba(255,255,255,0.2);padding-top:16px;">
                                    <div style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;opacity:0.7;">Tiempo de implementación</div>
                                    <div style="font-size:1.1rem;font-weight:800;margin-top:4px;">22 – 30 días</div>
                                    <p style="font-size:0.8rem;opacity:0.75;margin-top:4px;">Desde el primer contacto hasta tu droguería operativa en Tova</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel: Laboratorios -->
                <div v-if="activeSocio === 'laboratorios'" class="alianzas-panel">
                    <div class="especialista-grid">
                        <div class="especialista-content">
                            <span class="badge">Laboratorios</span>
                            <h2 class="section-title" style="text-align:left;margin-bottom:8px;">Tu catálogo, el primero que la IA TOVA aprende.</h2>
                            <p class="section-subtext" style="text-align:left;margin:0 0 24px;">
                                La IA TOVA hace el match de productos usando el catálogo que tú provees como referencia. Si tu catálogo es la fuente oficial, tu marca aparece primero en cada búsqueda de tu categoría — en toda la red.
                            </p>
                            <div class="especialista-features">
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Tu catálogo como referencia maestra</h4>
                                    <p class="esp-feature-text">Tus SKUs, nombres de marca y concentraciones son los datos base que la IA TOVA aprende primero. Tu nomenclatura gana antes que cualquier genérico.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Datos reales de la Venezuela operativa</h4>
                                    <p class="esp-feature-text">Panel administrativo con rotación por farmacia, precio promedio de venta y alertas de stock bajo. Reportes mensuales, trimestrales, semestrales y anuales.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">IA que aprende de cada corrección</h4>
                                    <p class="esp-feature-text">Cada vez que el farmacéutico valida un match, el sistema aprende. Tu marca gana consistencia y reconocimiento automático con el tiempo en toda la red.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Co-marketing con la red</h4>
                                    <p class="esp-feature-text">Acceso directo a los farmacéuticos de la red Tova: lanzamientos, ofertas de temporada y comunicaciones sobre tus productos llegan al punto de decisión.</p>
                                </div>
                            </div>
                        </div>
                        <div class="especialista-quote-card">
                            <span class="quote-icon">"</span>
                            <div style="display:flex;flex-direction:column;gap:16px;position:relative;z-index:1;">
                                <div>
                                    <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;opacity:0.7;margin-bottom:6px;">Modelo de alianza</div>
                                    <div style="font-size:1rem;font-weight:700;">Catálogo prioritario en IA TOVA</div>
                                    <p style="font-size:0.82rem;opacity:0.85;margin-top:6px;line-height:1.5;">Tu catálogo oficial es la referencia maestra que la IA TOVA usa antes que cualquier otra fuente.</p>
                                </div>
                                <div style="border-top:1px solid rgba(255,255,255,0.2);padding-top:16px;">
                                    <div style="font-size:1rem;font-weight:700;">Panel de datos en tiempo real</div>
                                    <p style="font-size:0.82rem;opacity:0.85;margin-top:6px;line-height:1.5;">Acceso permanente a métricas de tu portafolio: rotación, precio promedio de venta y alertas de reabastecimiento por farmacia.</p>
                                </div>
                                <div style="border-top:1px solid rgba(255,255,255,0.2);padding-top:16px;">
                                    <div style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;opacity:0.7;">Precisión de la IA TOVA</div>
                                    <div style="font-size:1.1rem;font-weight:800;margin-top:4px;">Confianza ≥ 0.90</div>
                                    <p style="font-size:0.8rem;opacity:0.75;margin-top:4px;">Umbral mínimo para aceptar un match de producto en el sistema</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel: Socios Comerciales -->
                <div v-if="activeSocio === 'comerciales'" class="alianzas-panel">
                    <div class="especialista-grid">
                        <div class="especialista-content">
                            <span class="badge">Socios Comerciales</span>
                            <h2 class="section-title" style="text-align:left;margin-bottom:8px;">Tienes la red.<br>Nosotros ponemos el producto.</h2>
                            <p class="section-subtext" style="text-align:left;margin:0 0 24px;">
                                No tienes que dejar lo que haces. Agrega Tova a tu portafolio y cierra farmacias con la misma conversación que ya tienes con ellas. El 100% del primer mes es tuyo. Nosotros implementamos, tú cobras.
                            </p>
                            <div class="especialista-features">
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">100% del primer mes + 5% perpetuo</h4>
                                    <p class="esp-feature-text">El primer mes de suscripción es íntegramente tuyo. Desde el mes 2, el 5% de cada renovación llega a ti mientras esa farmacia opere con Tova — sin límite de tiempo.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Demo en 48 horas para tu prospecto</h4>
                                    <p class="esp-feature-text">Trae el contacto, nosotros cerramos la demo. Tú enfocas tu tiempo en la relación con el cliente; el soporte técnico y la implementación corren completamente por nuestra cuenta.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">Exclusividad por zona al cumplir metas</h4>
                                    <p class="esp-feature-text">Después de alcanzar la cuota acordada, obtienes exclusividad territorial. Tu zona, tus clientes, tus comisiones — sin competencia interna dentro de la red Tova.</p>
                                </div>
                                <div class="esp-feature-item">
                                    <h4 class="esp-feature-title">El argumento de precio trabaja solo</h4>
                                    <p class="esp-feature-text">Los primeros 100 negocios entran a $29/mes plan Pro de por vida. Una farmacia que hoy paga más por un sistema genérico cambia a un ERP farmacéutico especializado por $29. La conversación es fácil.</p>
                                </div>
                            </div>
                        </div>
                        <div class="especialista-quote-card">
                            <span class="quote-icon">"</span>
                            <div style="display:flex;flex-direction:column;gap:16px;position:relative;z-index:1;">
                                <div>
                                    <div style="font-size:0.7rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;opacity:0.7;margin-bottom:6px;">Modelo de comisión</div>
                                    <div style="font-size:1rem;font-weight:700;">100% mes 1 · 5% desde el mes 2</div>
                                    <p style="font-size:0.82rem;opacity:0.85;margin-top:6px;line-height:1.5;">Cierra una farmacia a $29/mes: cobras $29 el primer mes y $1.45 cada mes que renueve — de por vida, sin expiración.</p>
                                </div>
                                <div style="border-top:1px solid rgba(255,255,255,0.2);padding-top:16px;">
                                    <div style="font-size:1rem;font-weight:700;">Materiales y capacitación incluidos</div>
                                    <p style="font-size:0.82rem;opacity:0.85;margin-top:6px;line-height:1.5;">Entrenamiento para demos, materiales de venta y acceso a sandbox de prueba. Salida al mercado en días, no semanas.</p>
                                </div>
                                <div style="border-top:1px solid rgba(255,255,255,0.2);padding-top:16px;">
                                    <div style="font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;opacity:0.7;">Farmacia operativa en</div>
                                    <div style="font-size:1.1rem;font-weight:800;margin-top:4px;">48 horas</div>
                                    <p style="font-size:0.8rem;opacity:0.75;margin-top:4px;">Desde el cierre hasta la farmacia corriendo en producción</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ── C. ARQUITECTURA DE IA ──────────────────────────────── -->
        <section class="architecture">
            <div class="container arch-grid">
                <div class="arch-content">
                    <span class="badge">Diferenciador técnico</span>
                    <h2 class="arch-title">La IA no es un feature.<br>Es la arquitectura.</h2>
                    <p class="arch-text">Cuatro capacidades de inteligencia artificial propias que automatizan lo que hoy cuesta tiempo y dinero en cada farmacia de tu red.</p>
                    <div class="tech-stack">
                        <span class="tech-tag">
                            <svg class="tech-icon" viewBox="0 0 24 24" fill="#4B8EF5"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                            IA TOVA
                        </span>
                        <span class="tech-tag">
                            <svg class="tech-icon" viewBox="0 0 24 24" fill="#E20074"><path d="M21 3L3 10.53v.98l6.84 2.65L12.48 21h.98L21 3z"/></svg>
                            BCV + Binance API
                        </span>
                        <span class="tech-tag">
                            <svg class="tech-icon" viewBox="0 0 24 24" fill="#27C93F"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                            SENIAT Compliant
                        </span>
                    </div>
                </div>

                <div class="arch-visual">
                    <div class="arch-item">
                        <div class="arch-num">01</div>
                        <div>
                            <h4 class="arch-item-title">Matching de productos con IA TOVA</h4>
                            <p class="arch-item-text">Identifica cada producto de la factura del proveedor por nombre de marca, principio activo, concentración y laboratorio. Confianza mínima 0.90. Aprende de cada corrección del farmacéutico.</p>
                        </div>
                    </div>
                    <div class="arch-item">
                        <div class="arch-num">02</div>
                        <div>
                            <h4 class="arch-item-title">OCR inteligente de facturas</h4>
                            <p class="arch-item-text">Fotografía la factura del proveedor y extrae automáticamente RIF, número de control, moneda, monto e ítems. Cero digitación manual en facturas de 200+ productos.</p>
                        </div>
                    </div>
                    <div class="arch-item">
                        <div class="arch-num">03</div>
                        <div>
                            <h4 class="arch-item-title">Asistente de pedidos (3 modos)</h4>
                            <p class="arch-item-text">Modo Promedio (histórico), Ventas Recientes o Combinado. Calcula la cantidad óptima a pedir y exporta el pedido listo para la droguería — sin hojas de cálculo.</p>
                        </div>
                    </div>
                    <div class="arch-item">
                        <div class="arch-num">04</div>
                        <div>
                            <h4 class="arch-item-title">Tasas BCV + mercado en tiempo real</h4>
                            <p class="arch-item-text">7 tipos de cambio actualizados automáticamente — tasa oficial y paralela incluidas. Los precios de la farmacia siempre correctos sin intervención manual del administrador.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── D. TABLA: LO QUE CONSTRUIMOS JUNTOS ───────────────── -->
        <section class="comparativa-section">
            <div class="container comparativa-container">
                <div class="section-header">
                    <span class="badge">El modelo</span>
                    <h2 class="section-title">Cada quien pone lo que mejor sabe hacer.</h2>
                    <p class="section-subtext">Tova aporta producto, tecnología y cumplimiento legal. Tú aportas red, presencia y conocimiento del mercado.</p>
                </div>
                <div class="table-wrapper">
                    <table class="comp-table">
                        <thead>
                            <tr>
                                <th class="feature-col">Tova / Valdusoft aporta</th>
                                <th class="tova-col tova-highlight">El socio aporta</th>
                                <th class="generic-col">Resultado compartido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="feature-col">ERP farmacéutico completo (35 módulos) — en producción y con clientes activos</td>
                                <td class="tova-col tova-highlight">Red de clientes y relaciones comerciales establecidas en el sector</td>
                                <td class="generic-col">Farmacias digitalizadas con solución especializada desde el primer día</td>
                            </tr>
                            <tr class="row-destacada">
                                <td class="feature-col">IA TOVA: OCR, matching de productos y asistente de pedidos</td>
                                <td class="tova-col tova-highlight">Conocimiento del mercado local y credibilidad ante las farmacias</td>
                                <td class="generic-col">Pedidos más precisos, menos errores y mayor volumen procesado</td>
                            </tr>
                            <tr>
                                <td class="feature-col">6 integraciones activas con droguerías (EDI / FTP / API)</td>
                                <td class="tova-col tova-highlight">Implementación, capacitación y relación presencial con el cliente</td>
                                <td class="generic-col">Canal de distribución digital automatizado y escalable</td>
                            </tr>
                            <tr class="row-destacada">
                                <td class="feature-col">Cumplimiento SENIAT, HKA y PNP — listo desde el día 1</td>
                                <td class="tova-col tova-highlight">Acceso a eventos, ferias y contactos clave del sector farmacéutico</td>
                                <td class="generic-col">Ingreso recurrente mensual por cada licencia activa en la red</td>
                            </tr>
                            <tr>
                                <td class="feature-col">Triple divisa nativa (Bs · USD · COP) con 7 tipos de tasa</td>
                                <td class="tova-col tova-highlight">Expansión geográfica dentro de Venezuela y zona fronteriza</td>
                                <td class="generic-col">Posición dominante en el segmento farmacéutico independiente</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- ── E. CTA FINAL ──────────────────────────────────────── -->
        <section class="migration-section">
            <div class="container">
                <div class="migration-card">
                    <div class="migration-grid">
                        <div class="migration-content">
                            <span class="migration-tag">El momento es ahora</span>
                            <h2 class="migration-title">La farmacia venezolana se está digitalizando. ¿Lideramos juntos?</h2>
                            <p class="migration-text">
                                Tova tiene el producto. Valdusoft tiene 11 años de respaldo. Tú tienes la red. La conversación que viene después de esta página es la que importa.
                            </p>
                            <div style="display:flex;flex-wrap:wrap;gap:12px;margin-top:8px;">
                                <div style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:10px;padding:12px 18px;">
                                    <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.45);margin-bottom:4px;">Contacto directo</div>
                                    <div style="font-size:0.9rem;color:#fff;font-weight:500;">alexisjoseva95@gmail.com</div>
                                </div>
                                <div style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:10px;padding:12px 18px;">
                                    <div style="font-size:0.65rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.45);margin-bottom:4px;">Proyecto</div>
                                    <div style="font-size:0.9rem;color:#fff;font-weight:500;">Tova ERP · Valdusoft · Táchira, Venezuela</div>
                                </div>
                            </div>
                        </div>
                        <div class="migration-action">
                            <a href="mailto:alexisjoseva95@gmail.com" class="btn migration-btn">
                                Iniciar conversación
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container footer-container">
                <div class="footer-logo">
                    <img class="logo-svg-footer" src="/logo/logo-tova-software-farmacias.svg" alt="TOVA ERP Logo">
                </div>
                <div class="footer-text">© 2026 Tova ERP · Desarrollado por Valdusoft. Todos los derechos reservados.</div>
            </div>
        </footer>

    </div>
</template>

<style scoped>
/* stat-box del hero — diseñadas para fondo oscuro, se usan sobre fondo claro */
.hero-visual :deep(.stat-box) {
    background: var(--color-dark-light);
    border-color: rgba(255, 255, 255, 0.06);
}
.hero-visual :deep(.stat-number) {
    color: var(--color-primary);
}
.hero-visual :deep(.stat-label) {
    color: rgba(255, 255, 255, 0.65);
}

.alianzas-tabs {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 40px;
    justify-content: center;
}

.alianzas-tab {
    padding: 10px 24px;
    border-radius: var(--radius-full);
    font-family: var(--font-heading);
    font-size: 0.9rem;
    font-weight: 600;
    border: 2px solid rgba(18, 20, 38, 0.1);
    background: transparent;
    color: #4A5073;
    cursor: pointer;
    transition: var(--transition-fast);
}

.alianzas-tab:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background: rgba(226, 0, 116, 0.04);
}

.alianzas-tab-active {
    background: var(--gradient-brand) !important;
    color: var(--color-white) !important;
    border-color: transparent !important;
    box-shadow: var(--shadow-brand);
}

.alianzas-panel {
    animation: fadeInPanel 0.3s ease;
}

@keyframes fadeInPanel {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>
