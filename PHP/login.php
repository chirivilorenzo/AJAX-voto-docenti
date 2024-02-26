<?php
    if(!isset($_SESSION)){
        session_start();
    }

    include("classi/CDatabase.php");

    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        
        //prendo le info in post
        $user = $_POST["username"];
        $psw = md5($_POST["password"]);


        //mi collego al db e cerco l'utente
        $classeDB = new CDatabase();
        $classeDB->connessione();

        $query = "SELECT * FROM utente WHERE username = ? AND password = ?";
        $row = $classeDB->seleziona($query, $user, $psw);


        if($row != "errore"){
            if($row[0]["admin"] == 1){
                $_SESSION["admin"] = true; 
                echo "admin";   //se l'utente è un amministratore
            }
            else{
                if($row[0]["votato"] == 1){
                    echo "400"; //se lo studente ha già votato
                }
                else{
                    $_SESSION["username"] = $user;
                    echo "200"; //se lo studente non ha votato
                }
            }     
        }
        else{
            echo "404"; //utente non trovato
        }

        $classeDB->chiudiConnessione();
    }
    else{
        echo "401"; //se si prova ad accedere alla pagina da browser
    }