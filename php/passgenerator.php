<?php
function randomstring () {

    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($chars),0,5);

}
$pass = randomstring();
    ?>