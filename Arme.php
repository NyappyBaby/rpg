<?php

namespace App\Entity;

class Arme {
    private $nom;
    private $degats;
    private $desc;


    public static $_armes = [];

    public function __construct(Array $data){

        $this->hydrate($data);
        self::$_armes[] = $this;

    }

    private function hydrate(Array $data){

        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }

    }

    public function getNom() : String {
        return $this->nom;
    }

    public function setNom(String $nom) : Void {
        $this->nom = $nom;
    } 

    public function getDegats() : Int {
        return $this->degats;
    }

    public function setDegats(Int $degats) : Void {
        $this->job = $degats;
    }
    
    
    public function getDesc() : String {
        return $this->desc;
    }

    public function setDesc(String $desc) : Void {
        $this->job = $desc;
    }
    
   

    public static function creerArmes() {
        $armements = [
            [
                'nom' => 'arc',
                'degats' => 45,
                'desc' => 'Arme formée d\'une tige souple que l\'on courbe au moyen d\'une corde attachée aux deux extrémités pour lancer des flèches.',
                
            ],
            [
                'nom' => 'epee',
                'degats' => 90,
                'desc' => 'Arme blanche faite d\'une lame aiguë et droite, emmanchée dans une poignée munie d\'une garde.',
               
            ],
            [
                'nom' => 'hache',
                'degats' => 75,
                'desc' => 'Instrument à lame tranchante, servant à fendre.',
               
            ]
        ];

        foreach($armements as $armement){
            new Personnage($armement);
        }

    }

    public static function recupererArmeParNom(String $nom) : ?Arme {
        foreach(self::$_armes as $armement){
            if($armement->nom === $nom){
                return $armement;
            }
        }
        return null;
    }

}