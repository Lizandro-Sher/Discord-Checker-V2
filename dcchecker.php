<?php

error_reporting(0);

// Remove cookie anterior
if (file_exists("cookie.txt")) {
    unlink("cookie.txt");
}

function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function multiexplode($string) {
    $delimiters = array("|", ";", ":", "/", "»", "«", ">", "<");
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}

$proxyFile = 'proxy.txt';
$proxies = file_exists($proxyFile) ? file($proxyFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

if (empty($proxies)) {
    die("❌ Nenhum proxy encontrado em proxy.txt\n");
}

$lista = $_GET['lista'];
$proxyParam = $_GET['proxy'] ?? null;

$parts = multiexplode($lista);
$code = $parts[0];

$url = "https://discord.com/api/v9/entitlements/gift-codes/$code?with_application=true&with_subscription_plan=true";

$headers = array(
    'accept: */*',
    'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    'referer: https://discord.com/gifts/' . $code,
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_PROXY, $proxyParam);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

// Decodifica o JSON retornado
$json = json_decode($response, true);

if ($response !== false && $httpcode > 0) {

    if ($httpcode == 404 || strpos($response, 'Unknown Gift Code') !== false) {
        echo "❌ Código de gift inválido. (<br><h5>http: $httpcode <br> response: $response</h5>)\n";
    } 
    elseif ($httpcode == 401) {
        echo "❌ Não autorizado. Token ausente ou inválido. (<br><h5>http: $httpcode <br> response: $response</h5>)\n";
    }
    elseif ($httpcode == 403) {
        echo "🔒 Acesso proibido. Permissões insuficientes. (<br><h5>http: $httpcode <br> response: $response</h5>)\n";
    }
    elseif ($httpcode == 500) {
        echo "⚠️ Erro interno no servidor do Discord. (<br><h5>http: $httpcode <br> response: $response</h5>)\n";
    }
    elseif ($httpcode == 200) {
        // Checagens detalhadas
        if (isset($json['code']) && $json['code'] == 50050) {
            echo "⚠️ Código já foi resgatado. (<br><h5>http: $httpcode <br> response: $response</h5>)\n";
        }
        elseif (strpos($response, '"gift_code":') !== false && strpos($response, '"uses":0') !== false) {
            echo "✅ Código válido e ainda não resgatado!<br><h5>http: $httpcode <br> response: $response</h5>\n";
        }
        elseif (strpos($response, '"subscription_plan"') !== false || strpos($response, '"application"') !== false) {
            echo "✅ Código válido com plano de assinatura!<br><h5>http: $httpcode <br> response: $response</h5>\n";
        }
        elseif (strpos($response, '"uses":0') !== false && strpos($response, '"subscription_plan"') !== false) {
            echo "✅ Código válido e pronto para resgate!<br><h5>http: $httpcode <br> response: $response</h5>\n";
        }
        elseif (isset($json['message'])) {
            echo "❌ Código inválido ou erro: " . $json['message'] . "\n";
        }
        else {
            echo "⚠️ HTTP 200, mas sem confirmação clara de validade. Verifique manualmente.<br><h5>http: $httpcode <br> response: $response</h5>\n";
        }
    } else {
        echo "⚠️ Código desconhecido ou erro inesperado (<br><h5>http: $httpcode <br> response: $response</h5>).\n";
    }

} else {
    echo "❌ Proxy falhou ou está offline: $proxyParam\n";
    if ($curl_error) {
        echo "💥 Erro cURL: $curl_error\n";
    }
    echo "🚫 Todos os proxies falharam. Nenhuma checagem pôde ser feita.\n";
}
