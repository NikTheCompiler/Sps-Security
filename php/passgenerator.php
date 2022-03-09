<?php
function randomstring () {

    $chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($chars),0,10);

}
$pass = randomstring();
    ?>