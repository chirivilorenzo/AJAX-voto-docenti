<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION["username"])){
        echo "200"; //l'utente è un utente normale
    }
    else if(isset($_SESSION["admin"])){
        echo "admin";   //l'utente è un admin
    }
    else if(isset($_SESSION["docente"])){
        echo "docente";
    }
    else{
        echo "300"; //l'utente non si è loggato
        exit();
    }