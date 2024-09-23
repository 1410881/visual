<?php
require_once 'Persona.php';

class Cliente extends Persona {

    public function __construct($nombre, $email) {
        parent::__construct($nombre, $email);
    }

    public function mostrarInformacion() {
        return "Cliente: $this->nombre, Email: $this->email";
    }
}
