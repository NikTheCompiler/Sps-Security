<?php
function Secure($type)
{
    if (!isset($_SESSION)) {
        //Not Logged In go to Login
        header('Location: ../login.php');
        session_destroy();

    } else {
        if (isset($_SESSION["type"])) {
            if ($_SESSION["type"] != $type) {
                //Access Denied Not Correct Privileges AKA AccType Different From permission variable of said page . 
                session_destroy();
                header('Location: ../404.php');
                exit();
            }
        } else {
            //This is redudant For some reason if Session is set and acctype not set ??
            session_destroy();
            header('Location: ../login.php');
            exit();
            //For testing
            //echo "Not Logged in";
        }
    }
}
?>