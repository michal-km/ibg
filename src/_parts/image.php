<?php
ini_set('display_errors', 0);
$url = $_GET['url'];
$session = curl_init($url);
//curl_setopt($session, CURLOPT_HEADER);
curl_setopt($session, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($session, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($session, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($session, CURLOPT_VERBOSE, true);
//curl_setopt($session, CURLOPT_FAILONERROR, true);
//curl_setopt($session, CURLINFO_HEADER_OUT, true);
try {
$response = curl_exec($session);
} catch (\Excetion $e) {}

if (isset($mimeType) && $mimeType != '') {
    header('Content-Type: ' . $mimeType);
}
echo $response;
curl_close($session);
