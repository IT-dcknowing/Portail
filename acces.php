<?php
// proxy.php
$url = 'http://192.168.1.20/ISAPI/AccessControl/AcsEvent?format=json';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
curl_setopt($ch, CURLOPT_USERPWD, 'admin:Dcknowing@2024');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'AcsEventCond' => [
        'searchID' => '001',
        'searchResultPosition' => 0,
        'major' => 5,
        'minor' => 0,
        'startTime' => '2024-08-01T00:00:00',
        'endTime' => '2024-08-31T23:59:59',
        'maxResults' => 2000,
    ],
]));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$result = curl_exec($ch);
curl_close($ch);

echo $result;


?>
