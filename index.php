<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 08/07/2016
 * Time: 16:07
 */
include("license_key.class.php");
if(isset($_GET['number'])) {
    if(isset($_GET['request']) && file_exists("notifications/" . $_GET['number'] . ".txt")) {
        $handle = fopen("notifications/" . $_GET['number'] . ".txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                echo $line;
                echo"\n";
            }
            fclose($handle);
            if ($_GET['number'] != 555666) {
                unlink("notifications/" . $_GET['number'] . ".txt");
            }
        } else {
        }
    } else {
        if(isset($_GET['key']) && isset($_GET['name'])) {
            $pass=new license_key();
            $pass->keylen=16;
            $pass->software='Notify';
            $validate= $pass->codeValidate($_GET['key'],$_GET['name']);
            if($validate=="YES" && isset($_GET['title']) && isset($_GET['message']) && isset($_GET['number'])) {
                file_put_contents('notifications/' . $_GET['number'] . '.txt', $_GET['title'] . "\n" . $_GET['message'] . "\n" . 'http://notifyer.ga/inc/logo.png');
                                if(isset($_GET['image'])) {
                    if($_GET['image'] !== "NO") {
                        echo "Images and icons are not supported by the free license. Ignoring the image / icon.";
                    }
                }
            }
            elseif($validate=="NO"){
                $pass=new license_key();
                $pass->keylen=16;
                $pass->software='NotifyPro';
                $validate= $pass->codeValidate($_GET['key'],$_GET['name']);
                if($validate=="YES" && isset($_GET['title']) && isset($_GET['message']) && isset($_GET['number'])) {
                    if(isset($_GET['image'])) {
                        if(filter_var($_GET['image'], FILTER_VALIDATE_URL) === FALSE)
                        {
                            echo "Invalid image URL ignoring it.";
                            file_put_contents('notifications/' . $_GET['number'] . '.txt', $_GET['title'] . "\n" . $_GET['message'] . "\n" . "http://notifyer.ga/inc/empty.png");
                        }else{
                            file_put_contents('notifications/' . $_GET['number'] . '.txt', $_GET['title'] . "\n" . $_GET['message'] . "\n" . $_GET['image']);
                        }
                    } else {
                        file_put_contents('notifications/' . $_GET['number'] . '.txt', $_GET['title'] . "\n" . $_GET['message'] . "\n" . "http://notifyer.ga/inc/empty.png");
                    }

                } else {
                    echo "Error, please check your request data";
                }
            }
        }
    }
}