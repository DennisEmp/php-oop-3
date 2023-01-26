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
    }
    class Impiegato extends Persona {
        private $data_assunzione;
        public function __construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale, $data_assunzione) {
            parent::__construct($nome, $cognome, $data_nascita, $luogo_nascita, $codice_fiscale);
            $this->data_assunzione = $data_assunzione;
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
        private $impiegato;
        private $importo;
        private $data_pagamento;
    
        public function __construct($impiegato, $importo, $data_pagamento) {
            $this->impiegato = $impiegato;
            $this->importo = $importo;
            $this->data_pagamento = $data_pagamento;
        }
        public function stipendioAnnuale() {
            $tredicesima = $this->importo / 12;
            $quattordicesima = $this->importo / 12;
            return 12 * $this->importo + $tredicesima + $quattordicesima;
        }
    }
?>


