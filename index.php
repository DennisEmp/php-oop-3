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
            echo     "<table>
                        <tr>
                            <td>Nome:</td>
                            <td>".$this->nome."</td>
                        </tr>
                        <tr>
                            <td>Cognome:</td>
                            <td>".$this->cognome."</td>
                        </tr>
                        <tr>
                            <td>Data di nascita:</td>
                            <td>".$this->data_nascita."</td>
                        </tr>
                        <tr>
                            <td>Luogo di nascita:</td>
                            <td>".$this->luogo_nascita."</td>
                        </tr>
                        <tr>
                            <td>Codice Fiscale:</td>
                            <td>".$this->codice_fiscale."</td>
                        </tr>
                    </table>";
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
            echo     "<table>
                        <tr>
                            <td>Nome:</td>
                            <td>".$this->nome."</td>
                        </tr>
                        <tr>
                            <td>Cognome:</td>
                            <td>".$this->cognome."</td>
                        </tr>
                        <tr>
                            <td>Data di nascita:</td>
                            <td>".$this->data_nascita."</td>
                        </tr>
                        <tr>
                            <td>Luogo di nascita:</td>
                            <td>".$this->luogo_nascita."</td>
                        </tr>
                        <tr>
                            <td>Codice Fiscale:</td>
                            <td>".$this->codice_fiscale."</td>
                        </tr>
                        <tr>
                            <td>Data di assunzione:</td>
                            <td>".$this->data_assunzione."</td>
                        </tr>
                        <tr>
                            <td>Stipendio annuale:</td>
                            <td>".$this->stipendio->stipendio_annuale()."</td>
                        </tr>
                    </table>";
        }
    }
    
    class Capo extends Persona {
        private $bonus;
        private $dividendo;
        public function __construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale, $bonus, $dividendo) {
            parent::__construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale, );
            $this->$bonus = $bonus;
            $this->$dividendo = $dividendo;
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

    $persona = new Persona("Mario", "Rossi", "01/01/2000", "Roma", "MRARSS00A01H501Q");
    echo $persona->getHTML();
    
    $impiegato = new Impiegato("Mario", "Rossi", "01/01/2000", "Roma", "MRARSS00A01H501Q", "01/01/2022", 2000, true, true);
    $impiegato->getHTML();

?>


