<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { useDemoStore } from '../Stores/demoStore';
import axios from 'axios';

// Instancia del almacén global de Pinia para controlar el modal
const demoStore = useDemoStore();

// Estados reactivos locales para controlar el flujo de envío y éxito del modal
const loadingText = ref('Configurando tu entorno personalizado...');
const showSuccessScreen = ref(false);
const registeredPharmacy = ref('');

// Estado reactivo para controlar si la barra de navegación se ha desplazado
const isScrolled = ref(false);

// Función para manejar el evento de scroll y aplicar estilos sticky reducidos
const handleScroll = () => {
    isScrolled.value = window.scrollY > 20;
};

// Registrar listener de scroll en el montaje y limpiarlo en el desmontaje
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

// Función para procesar el envío del formulario mediante Axios
const submitDemoForm = async () => {
    // Validaciones básicas de frontend
    demoStore.errors.pharmacy_name = null;
    demoStore.errors.whatsapp = null;

    let hasErrors = false;
    if (demoStore.form.pharmacy_name.trim().length < 3) {
        demoStore.errors.pharmacy_name = 'El nombre de la farmacia debe tener al menos 3 caracteres.';
        hasErrors = true;
    }
    if (demoStore.form.whatsapp.trim().length < 8) {
        demoStore.errors.whatsapp = 'Por favor, introduce un número de WhatsApp válido.';
        hasErrors = true;
    }

    if (hasErrors) return;

    demoStore.isSubmitting = true;

    try {
        // Petición POST al endpoint de Laravel
        const response = await axios.post('/demo-requests', {
            pharmacy_name: demoStore.form.pharmacy_name,
            whatsapp: demoStore.form.whatsapp
        });

        if (response.status === 201) {
            // Guardar el nombre de la farmacia para la pantalla de éxito
            registeredPharmacy.value = response.data.data.pharmacy_name;
            showSuccessScreen.value = true;
            
            // Efecto visual premium: cambiar textos del loader mientras se redirige
            setTimeout(() => {
                loadingText.value = 'Cargando inventario inteligente...';
            }, 1000);
            
            setTimeout(() => {
                loadingText.value = 'Inicializando gráficos de rentabilidad...';
            }, 2000);

            // Redirigir a la instancia de demo final del ERP (demo.tova.io o la provista por Laravel)
            setTimeout(() => {
                window.location.href = response.data.data.redirect_url;
            }, 3000);
        }
    } catch (error) {
        // Manejar errores de validación devueltos por el Form Request de Laravel
        if (error.response && error.response.status === 422) {
            const validationErrors = error.response.data.errors;
            if (validationErrors.pharmacy_name) {
                demoStore.errors.pharmacy_name = validationErrors.pharmacy_name[0];
            }
            if (validationErrors.whatsapp) {
                demoStore.errors.whatsapp = validationErrors.whatsapp[0];
            }
        } else {
            // Error genérico del servidor
            demoStore.errors.pharmacy_name = 'Ocurrió un error inesperado. Inténtalo de nuevo.';
        }
    } finally {
        demoStore.isSubmitting = false;
    }
};
</script>

<template>
    <div>
        <!-- Barra de Navegación Premium de Tres Columnas -->
        <header :class="['navbar', { 'navbar-scrolled': isScrolled }]">
            <div class="container navbar-container">
                <!-- Columna Izquierda: Identidad / Marca -->
                <a href="#" class="brand">
                    <!-- Logo Principal Oficial de TOVA optimizado en formato SVG -->
                    <img class="logo-svg" src="/logo/logo-tova-software-farmacias.svg" alt="TOVA - El Cerebro Operativo de tu Farmacia">
                </a>

                <!-- Columna Central: Navegación Informativa -->
                <ul class="nav-links">
                    <li><a href="#" class="nav-link">Inicio</a></li>
                    <li class="nav-dropdown-wrapper">
                        <a href="#pilares" class="nav-link">
                            Funcionalidades
                            <svg class="dropdown-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <!-- Menú Desplegable Dropdown Premium -->
                        <div class="nav-dropdown-menu">
                            <div class="nav-dropdown-item">
                                <a href="#pilares" class="dropdown-item-link">
                                    <div class="dropdown-item-icon">
                                        <!-- Icono Cerebro/IA -->
                                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <h4 class="dropdown-item-title">IA Order Assistant <span class="nav-badge-ia">IA</span></h4>
                                        <p class="dropdown-item-desc">Predicción inteligente de stock y compras eficientes en base a promedios móviles.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="nav-dropdown-item">
                                <a href="#pilares" class="dropdown-item-link">
                                    <div class="dropdown-item-icon">
                                        <!-- Icono Rayo/Acción Lotes -->
                                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>
                                    </div>
                                    <div class="dropdown-item-content">
                                        <h4 class="dropdown-item-title">Control de Lotes y Vencimiento</h4>
                                        <p class="dropdown-item-desc">Trazabilidad PEPS exacta para evitar pérdidas por merma y liquidación automatizada.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#especialista" class="nav-link">Nosotros</a></li>
                    <li><a href="#comparativa" class="nav-link">Precios</a></li>
                    <li><a href="#soporte" class="nav-link">Soporte / Ayuda</a></li>
                </ul>

                <!-- Columna Derecha: Acciones de Doble Compromiso -->
                <div class="nav-actions">
                    <button @click="demoStore.openModal()" class="btn btn-primary">Comenzar Ahora</button>
                </div>
            </div>
        </header>

        <!-- A. Hero Section (El Primer Impacto - Visual Agrandado y Nuevo Pitch de Elevador) -->
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-content">
                    <span class="badge">ERP + Inteligencia Artificial</span>
                    <h1 class="hero-title">
                        TOVA: El <span class="text-gradient">cerebro operativo</span> de tu farmacia.
                    </h1>
                    <p class="hero-subtext">
                        TOVA es el único sistema que no solo registra tus ventas; blinda tu rentabilidad prediciendo tus compras y asegura que no pierdas ni un dólar de tu capital de trabajo.
                    </p>
                    <div class="hero-ctas">
                        <button @click="demoStore.openModal()" class="btn btn-primary">
                            Solicitar Demo Gratuita
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                        <button @click="demoStore.openModal()" class="btn btn-secondary-cta">
                            Ver cómo ahorrar 15% en compras
                        </button>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <!-- Screenshot real del dashboard TOVA ERP optimizado para SEO -->
                    <div class="dashboard-preview-wrapper">
                        <img
                            src="/images/tova-erp-farmaceutico-dashboard-control-ventas-inventario.png"
                            alt="TOVA ERP Farmacéutico — Dashboard de control de ventas, inventario, lotes y rentabilidad para farmacias en Venezuela"
                            class="dashboard-preview-img"
                            width="820"
                            height="640"
                            loading="eager"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Franja de Alianzas e Integraciones (Prueba Social de Robustez) -->
        <section class="integrations-bar">
            <div class="container integrations-container">
                <div class="integrations-header">
                    <span class="integrations-label">Integrado con las principales droguerías del país</span>
                    <h3 class="integrations-title">Sincronización automática en tiempo real</h3>
                    <p class="integrations-subtitle">Compara inventarios, precios actualizados y descarga facturas digitales directo a tu stock en segundos.</p>
                </div>
                <div class="integrations-grid">
                    <!-- Integración 1: Droguería Cobeca -->
                    <div class="integration-item">
                        <img src="/images/cobeca.svg" alt="Droguería Cobeca" class="integration-logo-img" />
                    </div>
                    <!-- Integración 2: Drocerca -->
                    <div class="integration-item">
                        <img src="/images/Drocerca.png" alt="Drocerca" class="integration-logo-img" />
                    </div>
                    <!-- Integración 3: Dronena -->
                    <div class="integration-item">
                        <img src="/images/Dronena.png" alt="Dronena" class="integration-logo-img" />
                    </div>
                    <!-- Integración 4: dromega -->
                    <div class="integration-item">
                        <img src="/images/dromega.png" alt="Dromega" class="integration-logo-img" />
                    </div>
                    <!-- Integración 5: Cristalmedicals -->
                    <div class="integration-item">
                        <img src="/images/Cristalmedicals.png" alt="Cristalmedicals" class="integration-logo-img" />
                    </div>
                    <!-- Integración 6: Vitalclinic -->
                    <div class="integration-item">
                        <img src="/images/Vitalclinic.png" alt="Vitalclinic" class="integration-logo-img" />
                    </div>
                </div>
            </div>
        </section>

        <!-- B. El Pain Point (El Dolor del Farmacéutico) -->
        <section class="pain-point">
            <div class="container pain-point-grid">
                <div>
                    <h2 class="pain-title">¿Tu inventario está trabajando para ti, o tú para él?</h2>
                    <div class="pain-content">
                        <p>
                            Mantener productos de baja rotación o perder ventas por fallas de stock estrangula el flujo de caja de tu farmacia. TOVA elimina la incertidumbre en tus decisiones de compra, optimizando cada dólar de tu inventario mediante algoritmos inteligentes de reabastecimiento en tiempo real.
                        </p>
                        <button @click="demoStore.openModal()" class="btn btn-primary">Frenar Pérdidas Ahora</button>
                    </div>
                </div>
                
                <div class="pain-stats">
                    <div class="stat-box">
                        <div class="stat-number">Hasta 25%</div>
                        <div class="stat-label">De optimización en tu flujo de caja al liberar capital atrapado en productos de baja rotación.</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-number">0%</div>
                        <div class="stat-label">Incertidumbre en tu cadena de suministro. Compra exactamente lo que vas a vender antes de que venza.</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- C. Los 4 Pilares Comerciales "Killers" de TOVA -->
        <section id="pilares" class="pilares">
            <div class="container">
                <div class="section-header">
                    <span class="badge">Los 4 Pilares de TOVA</span>
                    <h2 class="section-title">El Efecto TOVA en tu Rentabilidad</h2>
                    <p class="section-subtext">Cuatro herramientas automatizadas que transforman la complejidad de tu inventario en decisiones financieras exactas.</p>
                </div>
                
                <div class="pilares-grid">
                    <!-- Pilar A: Recepción Blindada -->
                    <div class="pilar-card">
                        <div class="pilar-icon-container">
                            <!-- Icono Escudo y Check de Recepción Blindada -->
                            <svg class="pilar-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                        </div>
                        <h3 class="pilar-title">Recepción Blindada</h3>
                        <p class="pilar-text" style="color: var(--color-primary); font-weight: 700; font-size: 0.9rem; margin-top: -12px;">
                            "Carga facturas de 200 productos en segundos"
                        </p>
                        <p class="pilar-text">
                            Cruza instantáneamente lo que te despacha la droguería contra tu orden de compra original. Reconciliación Inteligente: si hay diferencias en precios pactados o unidades faltantes, TOVA te alerta al instante antes de que ingreses el inventario.
                        </p>
                    </div>

                    <!-- Pilar B: Cazador de Oportunidades -->
                    <div class="pilar-card">
                        <div class="pilar-icon-container">
                            <!-- Icono Señal / Radar de Ahorros -->
                            <svg class="pilar-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l6 6m0-6l-6 6m12-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3 class="pilar-title">Cazador de Oportunidades</h3>
                        <p class="pilar-text" style="color: var(--color-primary); font-weight: 700; font-size: 0.9rem; margin-top: -12px;">
                            "Compra como un experto, siempre al mejor precio"
                        </p>
                        <p class="pilar-text">
                            Monitorea en tiempo real los catálogos y ofertas de tus proveedores integrados. El sistema analiza variaciones de precios y te notifica proactivamente qué distribuidor tiene la mejor opción, garantizando hasta un 12% de ahorro en tu reposición respecto a la última compra.
                        </p>
                    </div>

                    <!-- Pilar C: Abastecimiento Predictivo -->
                    <div class="pilar-card">
                        <div class="pilar-icon-container">
                            <!-- Icono Cerebro / Inteligencia Predictiva -->
                            <svg class="pilar-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="pilar-title">Abastecimiento Predictivo</h3>
                        <p class="pilar-text" style="color: var(--color-primary); font-weight: 700; font-size: 0.9rem; margin-top: -12px;">
                            "Ni un producto de más, ni una venta perdida"
                        </p>
                        <p class="pilar-text">
                            <strong>IA Order Assistant:</strong> Nuestro algoritmo predice tus necesidades exactas de stock basándose en promedios móviles y tendencias de venta. Mantén tus estantes siempre abastecidos sin congelar dinero en inventario ocioso que no rota.
                        </p>
                    </div>

                    <!-- Pilar D: Ventas Dinámicas -->
                    <div class="pilar-card">
                        <div class="pilar-icon-container">
                            <!-- Icono Rayo / Acción Rápida Ventas -->
                            <svg class="pilar-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>
                        </div>
                        <h3 class="pilar-title">Ventas Dinámicas</h3>
                        <p class="pilar-text" style="color: var(--color-primary); font-weight: 700; font-size: 0.9rem; margin-top: -12px;">
                            "Vende antes de que venza tu lote"
                        </p>
                        <p class="pilar-text">
                            Liquidación estratégica y automática. Si un lote se acerca a su fecha crítica de vencimiento, TOVA sugiere promociones, combos o descuentos directamente en la pantalla del cajero para asegurar la salida del producto y salvar tu inversión a tiempo.
                        </p>
                    </div>

                    <!-- Pilar E: Roadmap Colaborativo -->
                    <div class="pilar-card">
                        <div class="pilar-icon-container">
                            <!-- Icono Engranaje / Desarrollo Compartido -->
                            <svg class="pilar-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.128 1.41-.513M5.105 6.543 6.516 7.056m12.378 9.888 1.41.513M12 3v1.5m0 15V21m-3.077-8.457-1.41-.513m14.095 5.128-1.41-.513M5.105 17.457l1.41-.513m12.378-9.888 1.41-.513" />
                            </svg>
                        </div>
                        <h3 class="pilar-title">Roadmap Colaborativo</h3>
                        <p class="pilar-text" style="color: var(--color-primary); font-weight: 700; font-size: 0.9rem; margin-top: -12px;">
                            "Tu opinión define nuestro código"
                        </p>
                        <p class="pilar-text">
                            Al unirte a TOVA, las necesidades particulares de tu operación entran directamente en nuestra cola de desarrollo prioritario. Diseñamos las futuras mejoras del sistema escuchando el día a día de tu farmacia.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Especialista: Diseñado por y para Farmacéuticos -->
        <section id="especialista" class="especialista-section">
            <div class="container especialista-grid">
                <div class="especialista-content">
                    <span class="badge">Especialistas en tu Sector</span>
                    <h2 class="section-title">Un ERP diseñado por y para farmacéuticos.</h2>
                    <p class="section-subtext" style="text-align: left; margin: 0;">
                        Los sistemas genéricos no distinguen entre vender una prenda de vestir y vender un medicamento. TOVA entiende las particularidades críticas del sector farmacéutico en Venezuela.
                    </p>
                    <div class="especialista-features">
                        <div class="esp-feature-item">
                            <h4 class="esp-feature-title">Rotación PEPS Automática</h4>
                            <p class="esp-feature-text">Garantiza el flujo correcto del stock basándose en las fechas de expiración exactas de cada lote ingresado. Vende siempre primero lo que está más próximo a vencer de forma automatizada.</p>
                        </div>
                        <div class="esp-feature-item">
                            <h4 class="esp-feature-title">Inventarios Cíclicos Auditados</h4>
                            <p class="esp-feature-text">Olvídate de cerrar la farmacia un domingo entero para contar productos. Organiza conteos rápidos por pasillos, laboratorios o estanterías específicas mientras el sistema sigue operando en cajas.</p>
                        </div>
                        <div class="esp-feature-item">
                            <h4 class="esp-feature-title">Rendimiento de Empleados y Turnos</h4>
                            <p class="esp-feature-text">Monitorea la eficiencia de tu equipo en tiempo real. TOVA audita las ventas generadas por cada cajero, la velocidad de atención, la apertura/cierre de turnos y los niveles de acceso al sistema.</p>
                        </div>
                        <div class="esp-feature-item">
                            <h4 class="esp-feature-title">Inteligencia y Control de Clientes</h4>
                            <p class="esp-feature-text">Conoce el comportamiento real de tus compradores. Registra el historial de consumo, frecuencia de visitas y fidelidad, permitiéndote identificar a tus clientes VIP y anticipar sus necesidades.</p>
                        </div>
                    </div>
                </div>
                
                <div class="especialista-quote-card">
                    <span class="quote-icon">“</span>
                    <p class="quote-text">
                        TOVA no es un simple punto de venta. Es la tecnología que transforma tu inventario en un activo eficiente, predice tus necesidades de compra y blinda la rentabilidad de tu farmacia.
                    </p>
                    <span class="quote-author">TOVA - El Cerebro Operativo de tu Farmacia</span>
                </div>
            </div>
        </section>

        <!-- Sección: Tabla Comparativa (¿Por qué TOVA no es un simple punto de venta?) -->
        <section id="comparativa" class="comparativa-section">
            <div class="container comparativa-container">
                <div class="section-header">
                    <span class="badge">Comparativa Directa</span>
                    <h2 class="section-title">¿Por qué TOVA no es un simple punto de venta?</h2>
                    <p class="section-subtext">Descubre la diferencia entre un registrador de caja genérico y un cerebro operativo completo.</p>
                    <p class="section-subtext" style="font-size: 0.95rem; color: var(--color-primary); font-weight: 600; margin-top: 8px;">
                        Inversión mensual transparente adaptada al volumen de tu farmacia. Solicita tu demo para conocer nuestros planes de suscripción SaaS.
                    </p>
                </div>
                
                <div class="table-wrapper">
                    <table class="comp-table">
                        <thead>
                            <tr>
                                <th class="feature-col">Característica Clave</th>
                                <th class="generic-col">Sistemas Genéricos</th>
                                <th class="tova-col tova-highlight">TOVA ERP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="feature-col">Control de Lotes y Vencimientos (PEPS)</td>
                                <td class="generic-col"><span class="cross-icon">❌ (Solo stock plano)</span></td>
                                <td class="tova-col tova-highlight">
                                    <span class="check-icon">
                                        <svg class="check-svg" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    </span>
                                </td>
                            </tr>
                            <tr class="row-destacada">
                                <td class="feature-col">IA Order Assistant (Predicción de Compra)</td>
                                <td class="generic-col"><span class="cross-icon">❌ (No posee)</span></td>
                                <td class="tova-col tova-highlight">
                                    <span class="check-icon">
                                        <svg class="check-svg" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="feature-col">Business Intelligence e Informes con IA</td>
                                <td class="generic-col"><span class="cross-icon">❌ (Reportes planos en PDF)</span></td>
                                <td class="tova-col tova-highlight">
                                    <span class="check-icon">
                                        <svg class="check-svg" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    </span>
                                </td>
                            </tr>
                            <tr class="row-destacada">
                                <td class="feature-col">Métricas de Rendimiento y Auditoría de Empleados</td>
                                <td class="generic-col"><span class="cross-icon">❌ (Solo registro de ventas básico)</span></td>
                                <td class="tova-col tova-highlight">
                                    <span class="check-icon">
                                        <svg class="check-svg" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="feature-col">Integración directa con Droguerías</td>
                                <td class="generic-col"><span class="cross-icon">❌ (Carga por Excel manual)</span></td>
                                <td class="tova-col tova-highlight">
                                    <span class="check-icon">
                                        <svg class="check-svg" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    </span>
                                </td>
                            </tr>
                            <tr class="row-destacada">
                                <td class="feature-col">Migración de Inventario sin costo en 24h</td>
                                <td class="generic-col"><span class="cross-icon">❌ (Soporte ausente)</span></td>
                                <td class="tova-col tova-highlight">
                                    <span class="check-icon">
                                        <svg class="check-svg" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- D. Social Proof / Autoridad Técnica -->
        <section class="architecture">
            <div class="container arch-grid">
                <div class="arch-content">
                    <span class="badge">Autoridad Técnica</span>
                    <h2 class="arch-title">Arquitectura de clase mundial.</h2>
                    <p class="arch-text">
                        Construido bajo estándares modernos (Laravel 12 + Vue 3), TOVA garantiza velocidad instantánea y seguridad bancaria para tus datos.
                    </p>
                    <div class="tech-stack">
                        <span class="tech-tag">
                            <!-- Laravel Icon -->
                            <svg class="tech-icon" viewBox="0 0 24 24" fill="#FF2D20"><path d="M21.6 3h-1.2c-.4 0-.8.2-.9.5L14.8 15h-.2L9.9 3.5c-.1-.3-.5-.5-.9-.5H7.8C7.3 3 7 3.3 7 3.8v16.4c0 .5.3.8.8.8h1.4c.5 0 .8-.3.8-.8V9.1h.2l3.8 9.3c.1.3.5.5.9.5h1.2c.4 0 .8-.2.9-.5l3.8-9.3h.2v11.1c0 .5.3.8.8.8h1.4c.5 0 .8-.3.8-.8V3.8c0-.5-.3-.8-.8-.8z"/></svg>
                            Laravel 12
                        </span>
                        <span class="tech-tag">
                            <!-- Vue Icon -->
                            <svg class="tech-icon" viewBox="0 0 24 24" fill="#41B883"><path d="M24,1.6L12,22.4L0,1.6h5.3l6.7,11.6L18.7,1.6H24z M17,1.6l-5,8.7l-5-8.7H0.7l11.3,19.6l11.3-19.6H17z"/></svg>
                            Vue 3
                        </span>
                        <span class="tech-tag">
                            <!-- SQLite / DB Icon -->
                            <svg class="tech-icon" viewBox="0 0 24 24" fill="#003B57"><path d="M12 2C6.48 2 2 4.02 2 6.5s4.48 4.5 10 4.5 10-2.02 10-4.5S17.52 2 12 2zm0 18c-5.52 0-10-2.02-10-4.5v-4c0 2.48 4.48 4.5 10 4.5s10-2.02 10-4.5v4c0 2.48-4.48 4.5-10 4.5zm0-9c-5.52 0-10-2.02-10-4.5v-1c0 2.48 4.48 4.5 10 4.5s10-2.02 10-4.5v1c0 2.48-4.48 4.5-10 4.5z"/></svg>
                            Base de Datos Blindada
                        </span>
                    </div>
                </div>
                
                <div class="arch-visual">
                    <div class="arch-item">
                        <div class="arch-num">01</div>
                        <div>
                            <h4 class="arch-item-title">Seguridad Bancaria</h4>
                            <p class="arch-item-text">Tus datos financieros y de inventario se encriptan bajo algoritmos de grado militar (AES-256), garantizando los máximos protocolos internacionales de privacidad.</p>
                        </div>
                    </div>
                    <div class="arch-item">
                        <div class="arch-num">02</div>
                        <div>
                            <h4 class="arch-item-title">Velocidad Instantánea</h4>
                            <p class="arch-item-text">Gracias a la integración de Vue 3 e Inertia.js, la interfaz responde en milisegundos, optimizando los tiempos en caja.</p>
                        </div>
                    </div>
                    <div class="arch-item">
                        <div class="arch-num">03</div>
                        <div>
                            <h4 class="arch-item-title">Estabilidad 99.9%</h4>
                            <p class="arch-item-text">Desplegado en servidores redundantes de alta disponibilidad, garantizando que tu sistema siga operando en cajas incluso en las horas de mayor tráfico del mes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Soporte / Ayuda: Vital para Software Crítico de Farmacias -->
        <section id="soporte" class="support-section">
            <div class="container support-grid">
                <div class="support-content">
                    <span class="badge">Soporte Ininterrumpido</span>
                    <h2 class="section-title">Soporte de nivel clínico para tu farmacia.</h2>
                    <p class="section-subtext" style="text-align: left; margin-bottom: 24px;">
                        Un error de sistema en una farmacia no es solo un problema administrativo; es un cliente que se va sin sus medicamentos. TOVA te ofrece la única garantía de soporte ultrarrápido en Venezuela.
                    </p>
                    <div class="support-features">
                        <div class="sup-feature">
                            <div class="sup-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            </div>
                            <div>
                                <h4 class="sup-title">Respuesta en &lt; 15 Minutos</h4>
                                <p class="sup-desc">Línea prioritaria directa para incidencias de caja. Si el sistema falla, un ingeniero se conecta de inmediato en remoto.</p>
                            </div>
                        </div>
                        <div class="sup-feature">
                            <div class="sup-icon">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/></svg>
                            </div>
                            <div>
                                <h4 class="sup-title">Tranquilidad Sanitaria y Control de Lotes</h4>
                                <p class="sup-desc">Adaptación inmediata a las normativas de control sanitario (SACS) para el registro de psicotrópicos y trazabilidad de medicamentos, manteniendo tu farmacia al día sin costes ocultos.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="support-card-glass">
                    <div class="support-card-header">
                        <div class="live-indicator">
                            <span class="live-dot animate-ping"></span>
                            <span class="live-text">SOPORTE TÉCNICO ACTIVO EN VENEZUELA</span>
                        </div>
                    </div>
                    <div class="support-card-body">
                        <h3 class="sup-card-title">¿Necesitas ayuda ahora mismo?</h3>
                        <p class="sup-card-text">Nuestro equipo de soporte está listo para asistirte en la migración de tu inventario o resolver cualquier duda técnica sobre el ERP.</p>
                        <div class="support-actions">
                            <button @click="demoStore.openModal()" class="btn btn-primary" style="width: 100%;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="margin-right: 4px;"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/></svg>
                                Hablar con un Asesor
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nueva Sección: Bono de Migración (Migración sin dolor) -->
        <section class="migration-section">
            <div class="container">
                <div class="migration-card">
                    <div class="migration-grid">
                        <div class="migration-content">
                            <span class="migration-tag">Bono de Migración Exclusivo</span>
                            <h2 class="migration-title">Migración sin dolor ni fricciones.</h2>
                            <p class="migration-text">
                                ¿Te preocupa pasar tu base de datos y catálogo al nuevo sistema? Nosotros nos encargamos de cargar todo tu inventario actual desde Excel o desde tu software anterior sin costo. Comienza a vender en menos de 24 horas.
                            </p>
                        </div>
                        <div class="migration-action">
                            <button @click="demoStore.openModal()" class="btn migration-btn">
                                Iniciar Migración Gratis
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer" class="footer">
            <div class="container footer-container">
                <div class="footer-logo">
                    <!-- Logo Principal Oficial de TOVA optimizado en formato SVG para el Footer -->
                    <img class="logo-svg-footer" src="/logo/logo-tova-software-farmacias.svg" alt="TOVA ERP Logo">
                </div>
                <div class="footer-text">
                    © 2026 TOVA. Todos los derechos reservados.
                </div>
            </div>
        </footer>

        <!-- 2. Estrategia de Showroom (Modal del Formulario Demo de Acceso Semi-Abierto) -->
        <div v-if="demoStore.isModalOpen" class="modal-overlay" @click.self="demoStore.closeModal()">
            <div class="modal-content">
                <!-- Botón de Cerrar Modal -->
                <button @click="demoStore.closeModal()" class="modal-close">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>

                <!-- Pantalla de Carga y Éxito Post-Envío (La Magia) -->
                <div v-if="showSuccessScreen" style="text-align: center; display: flex; flex-direction: column; gap: 24px; padding: 20px 0;">
                    <div style="width: 72px; height: 72px; border-radius: 50%; background: rgba(39, 201, 63, 0.1); display: flex; align-items: center; justify-content: center; color: #27C93F; margin: 0 auto;">
                        <!-- Icono Check de éxito en SVG -->
                        <svg width="36" height="36" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <h3 class="modal-title" style="color: #1E2243;">¡Solicitud Aprobada!</h3>
                        <p class="modal-description" style="font-weight: 500;">
                            Bienvenido a TOVA, <strong>{{ registeredPharmacy }}</strong>.
                        </p>
                    </div>
                    
                    <div style="display: flex; flex-direction: column; gap: 12px; align-items: center; margin-top: 10px;">
                        <!-- Cargador animado premium -->
                        <div style="width: 40px; height: 40px; border: 4px solid rgba(226, 0, 116, 0.1); border-top-color: var(--color-primary); border-radius: 50%; animation: popPoint 0.8s linear infinite; transform-origin: center; animation: drawLine 1s linear infinite;"></div>
                        <span style="font-size: 0.9rem; color: var(--color-secondary); font-weight: 600; min-height: 24px; transition: all 0.3s ease;">
                            {{ loadingText }}
                        </span>
                    </div>
                </div>

                <!-- Formulario Inicial de Datos del Lead -->
                <div v-else>
                    <div class="modal-header">
                        <h3 class="modal-title">Acceso a la Demo</h3>
                        <p class="modal-description">Descubre el ERP con datos precargados de ventas, inventario y facturas listas.</p>
                    </div>

                    <form @submit.prevent="submitDemoForm" style="margin-top: 24px;">
                        <!-- Campo: Nombre de la Farmacia -->
                        <div class="form-group">
                            <label class="form-label" for="pharmacy_name">Nombre de tu Farmacia</label>
                            <input 
                                v-model="demoStore.form.pharmacy_name"
                                class="form-input" 
                                type="text" 
                                id="pharmacy_name" 
                                placeholder="Ej. Farmacia San Juan"
                                :disabled="demoStore.isSubmitting"
                            >
                            <span v-if="demoStore.errors.pharmacy_name" class="form-error">
                                {{ demoStore.errors.pharmacy_name }}
                            </span>
                        </div>

                        <!-- Campo: WhatsApp de contacto -->
                        <div class="form-group">
                            <label class="form-label" for="whatsapp">Tu WhatsApp</label>
                            <input 
                                v-model="demoStore.form.whatsapp"
                                class="form-input" 
                                type="text" 
                                id="whatsapp" 
                                placeholder="Ej. +34 600 000 000"
                                :disabled="demoStore.isSubmitting"
                            >
                            <span v-if="demoStore.errors.whatsapp" class="form-error">
                                {{ demoStore.errors.whatsapp }}
                            </span>
                        </div>

                        <!-- Botón Enviar CTA -->
                        <button 
                            type="submit" 
                            class="btn btn-primary form-submit"
                            :disabled="demoStore.isSubmitting"
                            style="margin-top: 12px;"
                        >
                            <span v-if="demoStore.isSubmitting">Procesando...</span>
                            <span v-else>Entrar a la Demo Gratuita</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
