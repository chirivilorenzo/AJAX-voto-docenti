<?php

    include("classi/CDatabase.php");

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        $classeDB = new CDatabase();
        $classeDB->connessione();

        $user = $_POST["user"];
        $psw = md5($_POST["psw"]);
        $classe = $_POST["classe"];

        $query = "INSERT INTO utente (username, password, nomeClasse) VALUES (?, ?, ?)";
        $result = $classeDB->inserisci($query, $user, $psw, $classe);

        if($result){
            echo "200";
        }
        else{
            echo "300";
        }
    }
    else{
        echo "401";
    }