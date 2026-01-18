<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
// Configuration du serveur cible
$traccar_url = "https://shuttles.369degres.com/api/";
$auth = "Basic " . base64_encode("l.astori@369degres.com:Laur@2026"); // Vos nouveaux identifiants

$endpoint = $_GET['endpoint'];
$url = $traccar_url . $endpoint;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: $auth"]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Utile si le SSL pose problème

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

header("Content-Type: application/json");
http_response_code($http_code);
echo $response;

curl_close($ch);
?>
