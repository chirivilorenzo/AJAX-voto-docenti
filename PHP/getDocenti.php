<?php

    header('Content-Type: application/json');
    include("classi/CDatabase.php");

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION["classeStudente"])){
        header("Location: ../HTML/login.html");
    }

    if($_SERVER["REQUEST_METHOD"] === "GET"){

        //DEVE RITORNARE SOLO I DOCENTI CHE APPARTENGONO ALLA CLASSE DELLO STUDENTE INTERESSATO
        $classe = $_SESSION["classeStudente"];

        $classeDB = new CDatabase();
        $classeDB->connessione();

        $query = "SELECT * FROM docenti WHERE nomeClasse = ?";
        $result = $classeDB->seleziona($query, $classe);

        $docenti = [];
        foreach($result as $elemento){
            $docenti[] = $elemento;
        }

        echo json_encode($docenti);
    }
    else{
        echo "401";
    }