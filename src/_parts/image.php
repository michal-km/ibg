<?php
@$url = ($_POST['url']) ? $_POST['url'] : $_GET['url'];
@$headers = ($_POST['headers']) ? $_POST['headers'] : $_GET['headers'];
@$mimeType = ($_POST['mimeType']) ? $_POST['mimeType'] : $_GET['mimeType'];
$session = curl_init($url);

if (@$_POST['url']) {
    $postvars = '';

    while ($element = current($_POST)) {
        $postvars .= key($_POST) . '=' . $element . '&';
        next($_POST);
    }

    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_POSTFIELDS, $postvars);
}

curl_setopt($session, CURLOPT_HEADER, $headers == 'true');
curl_setopt($session, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($session);

if ($mimeType != '') {
    header('Content-Type: ' . $mimeType);
}

echo $response;

curl_close($session);