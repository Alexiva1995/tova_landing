<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>TOVA - El cerebro operativo de tu farmacia</title>
    
    <!-- Meta tags SEO -->
    <meta name="description" content="TOVA es un ERP de alto rendimiento impulsado por IA para farmacias. Optimiza inventarios, gestiona lotes con PEPS y automatiza tu contabilidad.">
    <meta name="keywords" content="tova erp, farmacia, software farmacia, inventario farmacia, control de lotes peps, ia farmacia">
    <meta name="author" content="TOVA">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/favicon/site.webmanifest" />

    <!-- Google Fonts: Outfit & Inter para tipografía moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @inertiaHead
    @vite(['resources/js/app.js'])
</head>
<body>
    @inertia
</body>
</html>
