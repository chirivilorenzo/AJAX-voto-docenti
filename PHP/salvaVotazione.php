<?php

    include("classi/CDatabase.php");


    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $classeDB = new CDatabase();
        $classeDB->connessione();

        $voti = $_POST["voti"];
        $voti = json_decode($voti);

        $flag = 0;

        //ciclo per scorrere gli elementi del vettore
        foreach($voti as $nomeDoc => $voto){
            $id = -1;
            
            //recupero l'id del docdente dal nome
            $query = "SELECT id FROM docenti WHERE nome = ?";
            $result = $classeDB->seleziona($query, $nomeDoc);

            if($result != "errore"){
                $id = $result[0]["id"];

                //metto il voto del docente dentro la tabella corrispondente
                $query = "INSERT INTO voti (voto, idDocente) VALUES (?, ?)";
                if(!$classeDB->inserisci($query, $voto, $id)){
                    $flag = 1;
                    break;
                }
            }
            else if($result == "errore"){
                $flag = 1;
                break;
            }
            else{
                echo "errore strano";
                exit();
            }
        }

        if($flag == 0){
            echo "200";
        }
        else{
            echo "300";
        }
    }
