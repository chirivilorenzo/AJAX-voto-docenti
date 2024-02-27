<?php

    header('Content-Type: application/json');
    include("classi/CDatabase.php");

    if($_SERVER["REQUEST_METHOD"] === "GET"){

        //DEVE RITORNARE SOLO I DOCENTI CHE APPARTENGONO ALLA CLASSE DELLO STUDENTE INTERESSATO

        $classeDB = new CDatabase();
        $classeDB->connessione();

        $query = "SELECT * FROM docenti";
        $result = $classeDB->seleziona($query);

        $docenti = [];
        foreach($result as $elemento){
            $generi[] = $elemento;
        }

        echo json_encode($generi);
    }
    else{
        echo "401";
    }