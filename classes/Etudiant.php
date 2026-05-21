<?php

class Etudiant {
    private $id;
    private $nom;
    private $prenom;
    private $ville;
    private $sexe;

    public function __construct($id = null, $nom = null, $prenom = null, $ville = null, $sexe = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->sexe = $sexe;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getVille() { return $this->ville; }
    public function getSexe() { return $this->sexe; }

    public function setId($id) { $this->id = $id; return $this; }
    public function setNom($nom) { $this->nom = htmlspecialchars(trim($nom)); return $this; }
    public function setPrenom($prenom) { $this->prenom = htmlspecialchars(trim($prenom)); return $this; }
    public function setVille($ville) { $this->ville = htmlspecialchars(trim($ville)); return $this; }
    public function setSexe($sexe) { $this->sexe = htmlspecialchars(trim($sexe)); return $this; }

    public function toArray() {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'ville' => $this->ville,
            'sexe' => $this->sexe
        ];
    }

    public function getNomComplet() {
        return $this->prenom . ' ' . $this->nom;
    }

    public function isValid() {
        return !empty($this->nom) && !empty($this->prenom) && !empty($this->ville) && !empty($this->sexe);
    }
}
