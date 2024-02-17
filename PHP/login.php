<?php

    include("classi/CDatabase.php");

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $user = $_POST["user"];
        $psw = md5($_POST["psw"]);


        $classeDB = new CDatabase();
        $classeDB->connessione();

        $query = "SELECT * FROM utente WHERE username = ? AND password = ?";

        $row = $classeDB->seleziona($query, $user, $psw);
        if($row != "errore"){
            $_SESSION["username"] = $user;
            echo "200";
        }
        else{
            echo "300";
        }
    }

