<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Azienda</title>
    <style>
    /* Stili per la tabella */
    table {
        border-collapse: collapse;
        width: 100%;
    }
    /* Stili per le celle */
    td, th {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }
    /* Stili per l'intestazione della tabella */
    th {
        background-color: #00B050;
        font-weight: bold;
    }
</style>
</head>
<body>
<?php
    class Persona {
        protected $nome;
        protected $cognome;
        protected $data_nascita;
        protected $luogo_nascita;
        protected $codice_fiscale;
        
        public function __construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale) {
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->data_nascita = $data_nascita;
            $this->luogo_nascita = $luogo_nascita;
            $this->codice_fiscale = $codice_fiscale;  
        }

        // tabella 
        public function getHTML(){
                    echo    "   <tr>
                                    <td>".$this->nome."</td>
                                    <td>".$this->cognome."</td>
                                    <td>".$this->data_nascita."</td>
                                    <td>".$this->luogo_nascita."</td>
                                    <td>".$this->codice_fiscale."</td>
                                </tr>";
        }
    }
    
    class Impiegato extends Persona {
        private $data_assunzione;
        private $stipendio;
        public function __construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale, $data_assunzione, $stipendio_mensile, $tredicesima, $quattordicesima) {
            parent::__construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale);
            $this->data_assunzione = $data_assunzione;
            $this->stipendio = new Stipendio($stipendio_mensile, $tredicesima, $quattordicesima);
        }
    
        public function getHTML() {
                    echo    "
                                <tr>
                                    <td>".$this->nome."</td>
                                    <td>".$this->cognome."</td>
                                    <td>".$this->data_nascita."</td>
                                    <td>".$this->luogo_nascita."</td>
                                    <td>".$this->codice_fiscale."</td>
                                    <td>".$this->data_assunzione."</td>
                                    <td>".$this->stipendio->stipendio_annuale()."</td>
                                </tr>
                            ";
        }

        
    }
    
    class Capo extends Persona {
        private $bonus;
        private $dividendo;
        public function __construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale, $bonus, $dividendo) {
            parent::__construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale, );
            $this->bonus = $bonus;
            $this->dividendo = $dividendo;
        }
        public function getHTML() {
            echo    "   <tr>
                            <td>".$this->nome."</td>
                            <td>".$this->cognome."</td>
                            <td>".$this->data_nascita."</td>
                            <td>".$this->luogo_nascita."</td>
                            <td>".$this->codice_fiscale."</td>
                            <td>".$this->bonus."</td>
                            <td>".$this->dividendo."</td>
                            <td>".$this->reddito_annuale()."</td>
                        </tr>";
        }
        public function reddito_annuale() {
        return $reddito_annuale = $this->dividendo * 12 + $this->bonus;
        }
    }

    class Stipendio {
        protected $stipendio_mensile;
        protected $tredicesima;
        protected $quattordicesima;
    
        public function __construct($stipendio_mensile, $tredicesima, $quattordicesima) {
            $this->stipendio_mensile = $stipendio_mensile;
            $this->tredicesima = $tredicesima;
            $this->quattordicesima = $quattordicesima;
        }
    
        public function stipendio_annuale() {
            $stipendio_annuale = $this->stipendio_mensile * 12 + ($this->tredicesima ? $this->stipendio_mensile : 0) + ($this->quattordicesima ? $this->stipendio_mensile : 0);
            return $stipendio_annuale;
        }
    }
    echo '<h3>PERSONA:</h3>';
    echo '<table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data di nascita</th>
                <th>Luogo di nascita</th>
                <th>Codice Fiscale</th>
            </tr>';
    $persona = new Persona("Mario", "Rossi", "01/01/2000", "Roma", "MRARSS00A01H501Q");
    echo $persona->getHTML();
    echo '</table>';
    echo '<br>';
    echo '<br>';
    echo '<h3>IMPIEGATO:</h3>';
    echo "<table>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    <th>Luogo di nascita</th>
                    <th>Codice Fiscale</th>
                    <th>Data di Assunzione</th>
                    <th>Stipendio Annuale</th>
                </tr>";
    $impiegato = new Impiegato("Mario", "Rossi", "01/01/2000", "Roma", "MRARSS00A01H501Q", "01/01/2022", 2000, true, true);
    $impiegato->getHTML();
    echo '<br>';
    echo '<br>';
    $impiegato = new Impiegato("Luigi", "Bianchi", "01/01/2000", "Roma", "MRARSS00A01H501Q", "01/01/2022", 2000, false, false);
    $impiegato->getHTML();
    echo '</table>';
    echo '<br>';
    echo '<br>';
    echo '<table>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    <th>Luogo di nascita</th>
                    <th>Codice Fiscale</th>
                    <th>Bonus</th>
                    <th>Dividendo</th>
                    <th>Reddito Annuale</th>
                </tr>';
    echo '<h3>CAPO:</h3>';
    $capo = new Capo("Romina", "Yari", "01/01/2000", "Roma", "MRARSS00A01H501Q", 1500, 2500);
    $capo->getHTML();
    echo '</table>';
?>
</body>
</html>