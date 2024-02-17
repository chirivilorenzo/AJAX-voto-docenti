<?php

    class CDatabase{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $mysqli;

        public function __construct(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "votazionidocenti";
        }

        public function connessione(){
            $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            $this->mysqli->set_charset("utf8mb4");
        }

        public function getTipoParametri(...$params){
            $tipoParametri = "";
            foreach($params as $elemento){
                if(gettype($elemento) == "integer") $tipoParametri .= "i";
                else if(gettype($elemento) == "string") $tipoParametri .= "s";
                else if(gettype($elemento) == "boolean") $tipoParametri .= "b";
                else if(gettype($elemento) == "double") $tipoParametri .= "f";    //float
            }

            return $tipoParametri;
        }

        public function inserisci($query, ...$parametri){

        }

        public function seleziona($query, ...$parametri){
            $stmt = $this->mysqli->prepare($query);

            $tipoParametri = $this->getTipoParametri(...$parametri);

            if($tipoParametri != ""){
                $stmt->bind_param($tipoParametri, ...$parametri);
            }

            if($stmt->execute()){
                $result = $stmt->get_result();

                $rows = array();
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }

                $stmt->close();
                return $rows;
            }
            else{
                return "errore";
            }
        }
    }