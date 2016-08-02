<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 08/07/2016
 * Time: 16:06
 */
function notify($key, $name, $number, $title, $message, $image = "NO"){
    $url = 'http://notifyer.ga/notify/?number=' . urlencode($number) . '&title=' . urlencode($title) . '&message=' . urlencode($message) . '&key=' . urlencode($key) . '&name=' . urlencode($name) . '&image=' . urlencode($image);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 2,
        CURLOPT_URL => $url,
    ));
    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp . $url;
}
echo notify("TNLT-VBRY-Y3T3-CA2P","Adam Mathieson", 109836, "Title", "Message");