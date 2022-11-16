<?php

class User {
    private $name;
    private $type;
    private $numberContact;
    private $emailContact;
    private $whatsapp;
    private $instagram;

    public function __construct($name, $type = null, $numberContact = null, $emailContact = null, $whatsapp = null, $instagram = null) {
        $this->setName($name);
        $this->setNumberContact($numberContact);
        $this->setEmailContact($emailContact);
        $this->setWhatsapp($whatsapp);
        $this->setInstagram($instagram);
        $this->setType($type);
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getNumberContact(){
        return $this->numberContact;
    }

    public function setNumberContact($numberContact){
        $this->numberContact = $numberContact;
    }

    public function getEmailContact(){
        return $this->emailContact;
    }

    public function setEmailContact($emailContact){
        $this->emailContact = $emailContact;
    }

    public function getWhatsapp(){
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp){
        $this->whatsapp = $whatsapp;
    }

    public function getInstagram(){
        return $this->instagram;
    }

    public function setInstagram($instagram){
        $this->instagram = $instagram;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    static function accessSeller() {
        return isset($_SESSION['user']) && $_SESSION['user']['type'] == 2 ? true : false; 
    }

    static function accessLogged() {
        return isset($_SESSION['user']); 
    }
}