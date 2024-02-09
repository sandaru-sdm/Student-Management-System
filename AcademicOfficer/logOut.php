<?php

    session_start();

    if(isset($_SESSION["academic"])){

        $_SESSION["academic"] = null;
        session_destroy();

        echo "success";

    }

?>