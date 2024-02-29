<?php

    include("classi/CDatabase.php");
    header('Content-Type: application/json');

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION["docente"])){
        
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $classeDB = new CDatabase();
            $classeDB->connessione();

            $idDocente = $_SESSION["docente"];

            $query = "SELECT * FROM voti WHERE idDocente = ?";
            $result = $classeDB->seleziona($query, $idDocente);

            if($result != "errore"){
    
                $voti = [];
                foreach($result as $elemento){
                    $voti[] = $elemento;
                }

                echo json_encode($voti);
            }
        }
    }
    else{
        echo "401";
    }