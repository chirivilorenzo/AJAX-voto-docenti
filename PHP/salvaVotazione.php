<?php

    include("classi/CDatabase.php");
    header('Content-Type: application/json');


    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $classeDB = new CDatabase();
        $classeDB->connessione();

        $voti = $_POST["voti"];
        echo json_encode($voti);
    }
