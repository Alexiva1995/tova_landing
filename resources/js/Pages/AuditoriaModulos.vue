<script setup>
import { ref, computed } from 'vue';

const searchQuery = ref('');
const activeCategory = ref('todos');

const categories = [
    { id: 'todos',      label: 'Todos los Módulos' },
    { id: 'ventas',     label: 'Ventas y Caja' },
    { id: 'inventario', label: 'Inventario' },
    { id: 'compras',    label: 'Compras e IA' },
    { id: 'finanzas',   label: 'Finanzas' },
    { id: 'rrhh',       label: 'RRHH y Nómina' },
    { id: 'fiscal',     label: 'Cumplimiento Fiscal' },
    { id: 'clientes',   label: 'Clientes y CRM' },
    { id: 'reportes',   label: 'Reportes e Inteligencia' },
];

const modules = [
    // ─── VENTAS Y CAJA ───────────────────────────────────────────────
    {
        category: 'ventas',
        categoryLabel: 'Ventas y Caja',
        title: 'Punto de Venta (POS)',
        role: 'Cajero',
        description: 'Registra ventas en segundos con búsqueda de productos por nombre, código o principio activo. Interfaz optimizada para atención rápida al cliente en mostrador.',
        benefit: 'Colas más cortas, menos errores en caja.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />'
    },
    {
        category: 'ventas',
        categoryLabel: 'Ventas y Caja',
        title: 'Facturación Fiscal SENIAT',
        role: 'Cajero / Administrador',
        description: 'Emite facturas legales automáticamente mediante impresoras HKA y PNP por red TCP/IP. Cumplimiento 100% legal desde el primer día, sin configuración manual.',
        benefit: 'Cero multas SENIAT, facturación automática.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />'
    },
    {
        category: 'ventas',
        categoryLabel: 'Ventas y Caja',
        title: 'Apertura y Cierre de Caja',
        role: 'Cajero / Administrador',
        description: 'Gestiona turnos de trabajo con apertura, cierre y cuadre de caja en múltiples monedas. Detecta diferencias al instante y genera resumen de turno por empleado.',
        benefit: 'Control total del efectivo por turno y cajero.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />'
    },
    {
        category: 'ventas',
        categoryLabel: 'Ventas y Caja',
        title: 'Liquidación Estratégica de Lotes',
        role: 'Cajero / Farmacéutico',
        description: 'Cuando un lote se acerca a su fecha de vencimiento, el sistema sugiere promociones y descuentos automáticamente en la pantalla del cajero para salvar la inversión.',
        benefit: 'Recupera el dinero de productos próximos a vencer.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />'
    },
    {
        category: 'ventas',
        categoryLabel: 'Ventas y Caja',
        title: 'Descuentos y Promociones',
        role: 'Administrador / Cajero',
        description: 'Configura descuentos por producto, laboratorio, categoría o cliente VIP. Los cajeros aplican las promociones vigentes automáticamente sin necesidad de intervención manual.',
        benefit: 'Promociones coherentes y controladas en todos los turnos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m4.5-3.493V21.75l-4.125-2.625-4.125 2.625L7.125 19.125 3 21.75V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />'
    },
    {
        category: 'ventas',
        categoryLabel: 'Ventas y Caja',
        title: 'Ventas Multi-Divisa',
        role: 'Cajero',
        description: 'Acepta pagos en Bolívares, Dólares y Pesos colombianos en la misma venta. Las tasas BCV y Binance se actualizan automáticamente para garantizar precios correctos.',
        benefit: 'Vende en 3 divisas sin errores de conversión.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />'
    },

    // ─── INVENTARIO ──────────────────────────────────────────────────
    {
        category: 'inventario',
        categoryLabel: 'Inventario',
        title: 'Control de Lotes y Vencimientos (PEPS)',
        role: 'Farmacéutico / Administrador',
        description: 'Cada producto se registra con número de lote, fecha de vencimiento y proveedor. El sistema asegura que siempre se despache primero el lote más próximo a vencer (FEFO automático).',
        benefit: 'Cero mermas por vencimiento sin vigilancia manual.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />'
    },
    {
        category: 'inventario',
        categoryLabel: 'Inventario',
        title: 'Inventarios Cíclicos Auditados',
        role: 'Farmacéutico / Administrador',
        description: 'Realiza conteos parciales por pasillo, estantería o laboratorio sin cerrar la farmacia. El sistema opera normalmente en cajas mientras el equipo actualiza el conteo físico.',
        benefit: 'Auditoría de inventario sin interrumpir la atención.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />'
    },
    {
        category: 'inventario',
        categoryLabel: 'Inventario',
        title: 'Alertas Inteligentes de Stock',
        role: 'Farmacéutico / Administrador',
        description: 'Recibe notificaciones automáticas cuando un producto llega a su punto de reorden, está próximo a vencer o registra movimientos inusuales. Evita quiebres de stock antes de que ocurran.',
        benefit: 'Nunca pierdas una venta por falta de stock.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />'
    },
    {
        category: 'inventario',
        categoryLabel: 'Inventario',
        title: 'Trazabilidad de Medicamentos',
        role: 'Farmacéutico / Administrador',
        description: 'Registra el origen y movimiento de cada unidad de medicamento con control especial para psicotrópicos y productos regulados por SACS (Servicio Autónomo de Contraloría Sanitaria).',
        benefit: 'Cumplimiento sanitario automático y sin papeleos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 1-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />'
    },

    // ─── COMPRAS E IA ────────────────────────────────────────────────
    {
        category: 'compras',
        categoryLabel: 'Compras e IA',
        title: 'IA Order Assistant',
        role: 'Administrador / Farmacéutico',
        description: 'Calcula automáticamente la cantidad exacta a pedir a cada droguería usando tres modos: Promedio histórico, Ventas recientes o Combinado. Exporta el pedido listo para enviar.',
        benefit: 'Compra solo lo necesario, ni más ni menos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.467 5.99 5.99 0 0 0-1.925 3.546 5.974 5.974 0 0 1-2.133-1A3.75 3.75 0 0 0 12 18Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636-.707.707M21 12h-1M4 12H3m3.343-5.657-.707-.707m2.828 9.9a5 5 0 1 1 7.072 0l-.548.547A3.374 3.374 0 0 0 14 18.469V19a2 2 0 1 1-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />'
    },
    {
        category: 'compras',
        categoryLabel: 'Compras e IA',
        title: 'Integración con 6 Droguerías',
        role: 'Administrador',
        description: 'Envía pedidos automáticamente a Dronena (EDI), Vitalclinic, Drocerca, Dromega (FTP), Cristmedicals (API REST) y Mafarta/Cobeca (PC-Correo) sin teléfono ni WhatsApp.',
        benefit: 'Pedidos sin errores de digitación a todos tus proveedores.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />'
    },
    {
        category: 'compras',
        categoryLabel: 'Compras e IA',
        title: 'OCR Inteligente de Facturas',
        role: 'Administrador / Farmacéutico',
        description: 'Fotografía o carga la factura de tu proveedor y la IA extrae automáticamente RIF, número de factura, moneda, monto e ítems con Gemini 2.5 Flash. Cero digitación manual.',
        benefit: 'Ingresa una factura de 200 productos en segundos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 3.75 9.375v-4.5ZM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 0 1-1.125-1.125v-4.5ZM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0 1 13.5 9.375v-4.5Z" /><path d="M6.75 6.75h.75v.75h-.75v-.75ZM6.75 16.5h.75v.75h-.75v-.75ZM16.5 6.75h.75v.75h-.75v-.75ZM13.5 13.5h.75v.75h-.75v-.75ZM13.5 19.5h.75v.75h-.75v-.75ZM19.5 13.5h.75v.75h-.75v-.75ZM19.5 19.5h.75v.75h-.75v-.75ZM16.5 16.5h.75v.75h-.75v-.75Z" />'
    },
    {
        category: 'compras',
        categoryLabel: 'Compras e IA',
        title: 'Matching de Productos con IA',
        role: 'Administrador / Farmacéutico',
        description: 'La IA identifica cada producto de la factura del proveedor con tu catálogo interno usando nombre de marca, principio activo, concentración y laboratorio. Aprende de cada corrección.',
        benefit: 'Nunca más ingresas el mismo producto dos veces por nombre distinto.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />'
    },
    {
        category: 'compras',
        categoryLabel: 'Compras e IA',
        title: 'Comparador de Precios entre Droguerías',
        role: 'Administrador',
        description: 'Visualiza en tiempo real el precio del mismo producto en todos tus proveedores conectados. Compra siempre en la droguería que ofrece la mejor condición ese día.',
        benefit: 'Ahorro de hasta 12% en cada reposición.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />'
    },

    // ─── FINANZAS ────────────────────────────────────────────────────
    {
        category: 'finanzas',
        categoryLabel: 'Finanzas',
        title: 'Multi-Wallet: Bs · USD · COP',
        role: 'Contador / Administrador',
        description: 'Administra tus saldos en Bolívares, Dólares y Pesos colombianos en cuentas separadas. Realiza transferencias entre monedas con la tasa vigente aplicada automáticamente.',
        benefit: 'Control total de tus 3 monedas en un solo lugar.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18-3a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6m18 0v3M3 6v3" />'
    },
    {
        category: 'finanzas',
        categoryLabel: 'Finanzas',
        title: 'Tasas de Cambio en Tiempo Real',
        role: 'Contador / Administrador',
        description: 'BCV y tasa paralela (Binance P2P) se actualizan automáticamente. El sistema aplica la tasa correcta a cada transacción sin intervención manual. 7 tipos de cambio disponibles.',
        benefit: 'Precios siempre actualizados sin editar manualmente.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />'
    },
    {
        category: 'finanzas',
        categoryLabel: 'Finanzas',
        title: 'Cuentas por Cobrar y Créditos',
        role: 'Contador / Administrador',
        description: 'Otorga crédito a clientes con montos, fechas de vencimiento y estados de cuenta. Recibe alertas de cuentas vencidas y genera estados de cuenta automáticos.',
        benefit: 'Control claro de quién te debe y cuánto.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />'
    },
    {
        category: 'finanzas',
        categoryLabel: 'Finanzas',
        title: 'Préstamos a Empleados',
        role: 'Administrador / Contador',
        description: 'Registra adelantos y préstamos al personal con cuotas de descuento automático en nómina. Lleva el saldo pendiente de cada empleado sin hojas de cálculo externas.',
        benefit: 'Cero confusiones en descuentos de nómina.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />'
    },

    // ─── RRHH Y NÓMINA ───────────────────────────────────────────────
    {
        category: 'rrhh',
        categoryLabel: 'RRHH y Nómina',
        title: 'Nómina Quincenal Automatizada',
        role: 'Administrador',
        description: 'Genera la nómina completa de todos los empleados cada quincena con un solo clic. Incluye salario base, bonificaciones, descuentos por ausencias, anticipos y beneficios.',
        benefit: 'Paga la nómina en minutos, no en horas.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 2.25v3.75m-16.5-3.75v3.75m0 4.5v-4.5m16.5 4.5v-4.5" />'
    },
    {
        category: 'rrhh',
        categoryLabel: 'RRHH y Nómina',
        title: 'Control de Turnos y Horarios',
        role: 'Administrador',
        description: 'Asigna turnos de trabajo, registra entradas y salidas, y calcula horas extras automáticamente. Identifica ausentismo y genera reportes de puntualidad por empleado.',
        benefit: 'Visibilidad total del tiempo de trabajo de tu equipo.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />'
    },
    {
        category: 'rrhh',
        categoryLabel: 'RRHH y Nómina',
        title: 'Beneficio de Salud Mensual',
        role: 'Administrador',
        description: 'Gestiona el beneficio de cesta ticket o asignación de salud mensual por empleado. El monto se descuenta automáticamente del total a pagar en la siguiente nómina.',
        benefit: 'Beneficios calculados y descontados sin errores.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />'
    },
    {
        category: 'rrhh',
        categoryLabel: 'RRHH y Nómina',
        title: 'Rendimiento por Cajero',
        role: 'Administrador',
        description: 'Monitorea las ventas generadas, el ticket promedio, la velocidad de atención y los descuentos aplicados por cada cajero en su turno. Identifica quiénes rinden más y quiénes necesitan apoyo.',
        benefit: 'Premia a los mejores y detecta problemas a tiempo.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Z" />'
    },

    // ─── CUMPLIMIENTO FISCAL ─────────────────────────────────────────
    {
        category: 'fiscal',
        categoryLabel: 'Cumplimiento Fiscal',
        title: 'Retenciones de IVA e ISLR',
        role: 'Contador',
        description: 'Calcula y aplica automáticamente las retenciones de IVA e ISLR en cada compra a proveedores y venta a clientes según los porcentajes vigentes del SENIAT.',
        benefit: 'Cumplimiento fiscal automático sin errores de cálculo.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m4.5-3.493V21.75l-4.125-2.625-4.125 2.625L7.125 19.125 3 21.75V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />'
    },
    {
        category: 'fiscal',
        categoryLabel: 'Cumplimiento Fiscal',
        title: 'Libro de Compras y Ventas',
        role: 'Contador',
        description: 'Genera los libros de compras y ventas en el formato oficial requerido por el SENIAT para la declaración mensual de IVA. Exporta el archivo listo para presentar.',
        benefit: 'Declaración de IVA sin auditorías de datos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />'
    },
    {
        category: 'fiscal',
        categoryLabel: 'Cumplimiento Fiscal',
        title: 'Control de Psicotrópicos (SACS)',
        role: 'Farmacéutico / Contador',
        description: 'Registra la entrada, venta y existencia de medicamentos controlados de acuerdo a las normativas del SACS. Genera los informes obligatorios de manera automática.',
        benefit: 'Inspecciones sanitarias sin improvisación.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />'
    },

    // ─── CLIENTES Y CRM ──────────────────────────────────────────────
    {
        category: 'clientes',
        categoryLabel: 'Clientes y CRM',
        title: 'Historial de Compras por Cliente',
        role: 'Cajero / Administrador',
        description: 'Registra el historial completo de compras de cada cliente: qué compra, con qué frecuencia y en qué moneda. Identifica patrones de consumo para anticipar sus necesidades.',
        benefit: 'Conoce a tus clientes mejor que ellos mismos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />'
    },
    {
        category: 'clientes',
        categoryLabel: 'Clientes y CRM',
        title: 'Programa de Clientes VIP',
        role: 'Administrador',
        description: 'Identifica automáticamente a tus mejores clientes por volumen de compra y frecuencia. Configura precios especiales, descuentos exclusivos y beneficios para fidelizarlos.',
        benefit: 'Retén a quienes más te compran con trato diferenciado.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.040.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />'
    },
    {
        category: 'clientes',
        categoryLabel: 'Clientes y CRM',
        title: 'Crédito a Clientes',
        role: 'Cajero / Administrador',
        description: 'Otorga líneas de crédito personalizadas, registra cada compra a crédito y controla los pagos abonados. Alerta automáticamente cuando una cuenta supera su límite o se vence.',
        benefit: 'Vende a crédito sin perder el control de cobros.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />'
    },

    // ─── REPORTES E INTELIGENCIA ─────────────────────────────────────
    {
        category: 'reportes',
        categoryLabel: 'Reportes e Inteligencia',
        title: 'Dashboard de Rentabilidad',
        role: 'Administrador / Dueño',
        description: 'Visualiza en tiempo real las métricas clave de tu farmacia: ventas del día, margen bruto, productos más rentables, comparativa de períodos y estado de inventario.',
        benefit: 'Decisiones basadas en datos, no en intuición.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />'
    },
    {
        category: 'reportes',
        categoryLabel: 'Reportes e Inteligencia',
        title: 'Análisis de Rotación de Productos',
        role: 'Administrador / Farmacéutico',
        description: 'Identifica qué productos se venden más, cuáles tienen baja rotación y cuáles están detenidos. Optimiza tu surtido eliminando el inventario que congela tu capital.',
        benefit: 'Libera hasta 25% del capital atrapado en baja rotación.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />'
    },
    {
        category: 'reportes',
        categoryLabel: 'Reportes e Inteligencia',
        title: 'Reporte de Compras y Proveedores',
        role: 'Administrador / Contador',
        description: 'Analiza cuánto le compras a cada droguería, el precio promedio pagado por producto y las variaciones de precios en el tiempo. Negocia con datos sólidos.',
        benefit: 'Negocia mejores condiciones con evidencia en mano.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />'
    },
    {
        category: 'reportes',
        categoryLabel: 'Reportes e Inteligencia',
        title: 'Informe de Cierre Diario',
        role: 'Administrador / Contador',
        description: 'Genera el resumen del día con ventas totales por moneda, número de transacciones, ticket promedio, mejor cajero del día y comparativa con el mismo día de la semana anterior.',
        benefit: 'Sabe exactamente cómo cerró el día en 30 segundos.',
        icon: '<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />'
    },
];

const filteredModules = computed(() => {
    const q = searchQuery.value.toLowerCase().trim();
    return modules.filter(m => {
        const matchCat = activeCategory.value === 'todos' || m.category === activeCategory.value;
        if (!q) return matchCat;
        const matchSearch = m.title.toLowerCase().includes(q) ||
            m.description.toLowerCase().includes(q) ||
            m.role.toLowerCase().includes(q) ||
            m.categoryLabel.toLowerCase().includes(q) ||
            m.benefit.toLowerCase().includes(q);
        return matchCat && matchSearch;
    });
});

const resultCount = computed(() => filteredModules.value.length);
</script>

<template>
    <div class="auditoria-page">

        <!-- Navbar reutiliza los mismos estilos del landing -->
        <header class="navbar navbar-scrolled">
            <div class="container navbar-container">
                <a href="/" class="brand">
                    <img class="logo-svg" src="/logo/logo-tova-software-farmacias.svg" alt="TOVA ERP">
                </a>
                <ul class="nav-links">
                    <li><a href="/" class="nav-link">Inicio</a></li>
                    <li><a href="/#pilares" class="nav-link">Funcionalidades</a></li>
                    <li><a href="/modulos" class="nav-link nav-link-active">Auditoría de Módulos</a></li>
                    <li><a href="/#especialista" class="nav-link">Nosotros</a></li>
                    <li><a href="/#soporte" class="nav-link">Soporte</a></li>
                </ul>
                <div class="nav-actions">
                    <a href="/#" class="btn btn-primary">Comenzar Ahora</a>
                </div>
            </div>
        </header>

        <!-- ── HERO ──────────────────────────────────────────────────── -->
        <section class="auditoria-hero">
            <div class="container">
                <div class="auditoria-hero-content">
                    <span class="badge">Transparencia total</span>
                    <h1 class="auditoria-title">
                        Auditoría de <span class="text-gradient">Módulos</span>
                    </h1>
                    <p class="auditoria-subtitle">
                        34 módulos organizados por rol y función. Descubre exactamente qué puede hacer TOVA ERP para tu cajero, farmacéutico, administrador y contador.
                    </p>

                    <!-- Métricas destacadas -->
                    <div class="auditoria-metrics">
                        <div class="metric-chip">
                            <span class="metric-value">34</span>
                            <span class="metric-label">Módulos</span>
                        </div>
                        <div class="metric-chip">
                            <span class="metric-value">8</span>
                            <span class="metric-label">Categorías</span>
                        </div>
                        <div class="metric-chip metric-chip-accent">
                            <span class="metric-value">6</span>
                            <span class="metric-label">Droguerías integradas</span>
                        </div>
                        <div class="metric-chip">
                            <span class="metric-value">3</span>
                            <span class="metric-label">Divisas nativas</span>
                        </div>
                        <div class="metric-chip">
                            <span class="metric-value">IA</span>
                            <span class="metric-label">Gemini 2.5 Flash</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── BUSCADOR Y FILTROS ─────────────────────────────────────── -->
        <section class="auditoria-filters-section">
            <div class="container">
                <!-- Buscador -->
                <div class="search-wrapper">
                    <svg class="search-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input
                        v-model="searchQuery"
                        class="search-input"
                        type="text"
                        placeholder="Buscar por módulo, función o usuario (cajero, administrador...)"
                    />
                    <span v-if="searchQuery" class="search-count">{{ resultCount }} resultado{{ resultCount !== 1 ? 's' : '' }}</span>
                </div>

                <!-- Filtros de categoría -->
                <div class="filter-pills">
                    <button
                        v-for="cat in categories"
                        :key="cat.id"
                        :class="['filter-pill', { 'filter-pill-active': activeCategory === cat.id }]"
                        @click="activeCategory = cat.id"
                    >
                        {{ cat.label }}
                    </button>
                </div>
            </div>
        </section>

        <!-- ── GRID DE MÓDULOS ──────────────────────────────────────────── -->
        <section class="auditoria-grid-section">
            <div class="container">

                <!-- Estado vacío -->
                <div v-if="filteredModules.length === 0" class="empty-state">
                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" width="48" height="48">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <h3>Sin resultados para "{{ searchQuery }}"</h3>
                    <p>Intenta con otro término o selecciona "Todos los Módulos".</p>
                    <button class="btn btn-primary" @click="searchQuery = ''; activeCategory = 'todos'">
                        Ver todos los módulos
                    </button>
                </div>

                <!-- Listado de módulos -->
                <div v-else class="modules-grid">
                    <div
                        v-for="mod in filteredModules"
                        :key="mod.title"
                        class="module-card"
                    >
                        <!-- Icono -->
                        <div class="module-icon-wrap">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                 class="module-icon" v-html="mod.icon"></svg>
                        </div>

                        <!-- Cabecera -->
                        <div class="module-meta">
                            <span class="module-category-tag">{{ mod.categoryLabel }}</span>
                            <span class="module-role-tag">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                {{ mod.role }}
                            </span>
                        </div>

                        <h3 class="module-title">{{ mod.title }}</h3>
                        <p class="module-desc">{{ mod.description }}</p>

                        <!-- Beneficio de negocio -->
                        <div class="module-benefit">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>{{ mod.benefit }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── CTA FINAL ──────────────────────────────────────────────── -->
        <section class="auditoria-cta">
            <div class="container">
                <div class="migration-card">
                    <div class="migration-grid">
                        <div class="migration-content">
                            <span class="migration-tag">¿Listo para implementarlo?</span>
                            <h2 class="migration-title">Los 34 módulos activos desde el día 1.</h2>
                            <p class="migration-text">
                                Migramos tu inventario actual gratis en menos de 24 horas. Comienza a vender con control total sin interrumpir tu operación.
                            </p>
                        </div>
                        <div class="migration-action">
                            <a href="/" class="btn migration-btn">
                                Solicitar Demo Gratuita
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
                <div class="footer-text">© 2026 TOVA. Todos los derechos reservados.</div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* ── Página contenedor ─────────────────────────────────────────────── */
.auditoria-page {
    background: var(--color-light);
    min-height: 100vh;
}

/* ── Navbar: enlace activo ─────────────────────────────────────────── */
.nav-link-active {
    color: var(--color-primary) !important;
    font-weight: 700;
}

/* ── Hero ──────────────────────────────────────────────────────────── */
.auditoria-hero {
    padding: 140px 0 60px;
    background: radial-gradient(circle at 90% 10%, rgba(122, 0, 153, 0.07) 0%, transparent 50%),
                radial-gradient(circle at 5%  90%, rgba(226, 0, 116, 0.05) 0%, transparent 50%);
}

.auditoria-hero-content {
    display: flex;
    flex-direction: column;
    gap: 20px;
    max-width: 760px;
}

.auditoria-title {
    font-size: clamp(2.4rem, 5vw, 3.8rem);
    font-weight: 800;
    letter-spacing: -1px;
    line-height: 1.1;
}

.auditoria-subtitle {
    font-size: 1.15rem;
    color: #4A5073;
    max-width: 600px;
    line-height: 1.65;
}

/* ── Métricas del hero ─────────────────────────────────────────────── */
.auditoria-metrics {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 8px;
}

.metric-chip {
    display: flex;
    align-items: center;
    gap: 10px;
    background: var(--color-white);
    border: 1px solid rgba(18, 20, 38, 0.08);
    border-radius: var(--radius-full);
    padding: 8px 20px;
    box-shadow: var(--shadow-sm);
    transition: var(--transition-fast);
}

.metric-chip:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.metric-chip-accent {
    border-color: rgba(226, 0, 116, 0.2);
    background: rgba(226, 0, 116, 0.04);
}

.metric-value {
    font-family: var(--font-heading);
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--color-primary);
    line-height: 1;
}

.metric-label {
    font-size: 0.82rem;
    font-weight: 600;
    color: #4A5073;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* ── Buscador y filtros ────────────────────────────────────────────── */
.auditoria-filters-section {
    background: var(--color-white);
    padding: 32px 0;
    border-top: 1px solid rgba(18, 20, 38, 0.04);
    border-bottom: 1px solid rgba(18, 20, 38, 0.04);
    position: sticky;
    top: 70px;
    z-index: 90;
    box-shadow: var(--shadow-sm);
}

.search-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}

.search-icon {
    position: absolute;
    left: 18px;
    width: 20px;
    height: 20px;
    color: #9BA3BF;
    pointer-events: none;
    flex-shrink: 0;
}

.search-input {
    width: 100%;
    background: var(--color-light);
    border: 1.5px solid rgba(18, 20, 38, 0.08);
    border-radius: var(--radius-full);
    padding: 14px 140px 14px 52px;
    font-family: var(--font-body);
    font-size: 1rem;
    color: var(--color-dark);
    transition: var(--transition-fast);
}

.search-input:focus {
    outline: none;
    border-color: var(--color-primary);
    background: var(--color-white);
    box-shadow: 0 0 0 4px rgba(226, 0, 116, 0.08);
}

.search-input::placeholder {
    color: #9BA3BF;
}

.search-count {
    position: absolute;
    right: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--color-primary);
    background: rgba(226, 0, 116, 0.08);
    border-radius: var(--radius-full);
    padding: 4px 12px;
    pointer-events: none;
}

.filter-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.filter-pill {
    padding: 8px 18px;
    border-radius: var(--radius-full);
    font-size: 0.85rem;
    font-weight: 600;
    border: 1.5px solid rgba(18, 20, 38, 0.1);
    background: transparent;
    color: #4A5073;
    cursor: pointer;
    transition: var(--transition-fast);
}

.filter-pill:hover {
    border-color: var(--color-primary);
    color: var(--color-primary);
    background: rgba(226, 0, 116, 0.04);
}

.filter-pill-active {
    background: var(--gradient-brand);
    color: var(--color-white) !important;
    border-color: transparent !important;
    box-shadow: var(--shadow-brand);
}

/* ── Grid de módulos ───────────────────────────────────────────────── */
.auditoria-grid-section {
    padding: 64px 0 80px;
}

.modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
}

.module-card {
    background: var(--color-white);
    border: 1px solid rgba(18, 20, 38, 0.06);
    border-radius: var(--radius-lg);
    padding: 32px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    transition: var(--transition-normal);
    position: relative;
    overflow: hidden;
}

.module-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--gradient-brand);
    opacity: 0;
    transition: var(--transition-fast);
}

.module-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(18, 20, 38, 0.08);
}

.module-card:hover::before {
    opacity: 1;
}

.module-icon-wrap {
    width: 52px;
    height: 52px;
    border-radius: var(--radius-md);
    background: rgba(122, 0, 153, 0.06);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-secondary);
    transition: var(--transition-normal);
    flex-shrink: 0;
}

.module-card:hover .module-icon-wrap {
    background: var(--gradient-brand);
    color: var(--color-white);
}

.module-icon {
    width: 26px;
    height: 26px;
}

.module-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}

.module-category-tag {
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: var(--color-primary);
    background: rgba(226, 0, 116, 0.08);
    border-radius: var(--radius-full);
    padding: 3px 10px;
}

.module-role-tag {
    font-size: 0.72rem;
    font-weight: 600;
    color: #6C7293;
    background: rgba(18, 20, 38, 0.04);
    border-radius: var(--radius-full);
    padding: 3px 10px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.module-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--color-dark);
    line-height: 1.3;
}

.module-desc {
    font-size: 0.9rem;
    color: #4A5073;
    line-height: 1.6;
    flex: 1;
}

.module-benefit {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    background: rgba(39, 201, 63, 0.06);
    border: 1px solid rgba(39, 201, 63, 0.15);
    border-radius: var(--radius-sm);
    padding: 10px 14px;
    color: #1A7A2A;
    font-size: 0.82rem;
    font-weight: 600;
    line-height: 1.4;
    margin-top: auto;
}

.module-benefit svg {
    color: #27C93F;
    flex-shrink: 0;
    margin-top: 1px;
}

/* ── Estado vacío ──────────────────────────────────────────────────── */
.empty-state {
    text-align: center;
    padding: 80px 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 16px;
}

.empty-state svg {
    color: #C5CAE0;
}

.empty-state h3 {
    font-size: 1.5rem;
    color: var(--color-dark);
}

.empty-state p {
    color: #4A5073;
    font-size: 1rem;
}

/* ── CTA ───────────────────────────────────────────────────────────── */
.auditoria-cta {
    padding: 0 0 100px;
    background: var(--color-light);
}

/* ── Responsividad ─────────────────────────────────────────────────── */
@media (max-width: 1024px) {
    .nav-links { display: none; }
    .modules-grid { grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); }
}

@media (max-width: 768px) {
    .auditoria-hero { padding: 120px 0 48px; }
    .auditoria-title { font-size: 2.2rem; }
    .modules-grid { grid-template-columns: 1fr; }
    .auditoria-filters-section { top: 70px; }
    .search-input { padding-right: 20px; }
    .search-count { display: none; }
}
</style>
