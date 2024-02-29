<?php

    header('Content-Type: application/json');
    include("classi/CDatabase.php");

    if($_SERVER["REQUEST_METHOD"] === "GET"){

        $classeDB = new CDatabase();
        $classeDB->connessione();

        $query = "SELECT * FROM classi";
        $result = $classeDB->seleziona($query);

        if($result != "errore"){

            $classi = [];
            foreach($result as $elemento){
                $classi[] = $elemento;
            }
        }

        echo json_encode($classi);
    }
    else{
        echo "401";
    }