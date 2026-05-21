<?php
require_once '../classes/Etudiant.php';
require_once '../connexion/Connexion.php';
require_once '../dao/IDao.php';

class EtudiantService implements IDao {
    private $connexion;
    private $pdo;

    public function __construct() {
        $this->connexion = Connexion::getInstance();
        $this->pdo = $this->connexion->getConnexion();
    }

    public function create($o) {
        try {
            $sql = "INSERT INTO Etudiant (nom, prenom, ville, sexe)
                    VALUES (:nom, :prenom, :ville, :sexe)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $o->getNom(),
                ':prenom' => $o->getPrenom(),
                ':ville' => $o->getVille(),
                ':sexe' => $o->getSexe()
            ]);

            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log("Erreur create: " . $e->getMessage());
            return false;
        }
    }

    public function delete($o) {
        try {
            $sql = "DELETE FROM Etudiant WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([':id' => $o->getId()]);
        } catch (PDOException $e) {
            error_log("Erreur delete: " . $e->getMessage());
            return false;
        }
    }

    public function update($o) {
        try {
            $sql = "UPDATE Etudiant
                    SET nom = :nom, prenom = :prenom, ville = :ville, sexe = :sexe
                    WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':id' => $o->getId(),
                ':nom' => $o->getNom(),
                ':prenom' => $o->getPrenom(),
                ':ville' => $o->getVille(),
                ':sexe' => $o->getSexe()
            ]);
        } catch (PDOException $e) {
            error_log("Erreur update: " . $e->getMessage());
            return false;
        }
    }

    public function findAll() {
        $etudiants = [];
        try {
            $sql = "SELECT * FROM Etudiant ORDER BY id DESC";
            $stmt = $this->pdo->query($sql);
            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                $etudiant = new Etudiant();
                $etudiant->setId($row['id'])
                        ->setNom($row['nom'])
                        ->setPrenom($row['prenom'])
                        ->setVille($row['ville'])
                        ->setSexe($row['sexe']);
                $etudiants[] = $etudiant;
            }
        } catch (PDOException $e) {
            error_log("Erreur findAll: " . $e->getMessage());
        }
        return $etudiants;
    }

    public function findById($id) {
        try {
            $sql = "SELECT * FROM Etudiant WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch();

            if ($row) {
                $etudiant = new Etudiant();
                $etudiant->setId($row['id'])
                        ->setNom($row['nom'])
                        ->setPrenom($row['prenom'])
                        ->setVille($row['ville'])
                        ->setSexe($row['sexe']);
                return $etudiant;
            }
        } catch (PDOException $e) {
            error_log("Erreur findById: " . $e->getMessage());
        }
        return null;
    }

    public function findAllApi() {
        try {
            $sql = "SELECT * FROM Etudiant ORDER BY id DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erreur findAllApi: " . $e->getMessage());
            return [];
        }
    }

    public function searchByNom($nom) {
        try {
            $sql = "SELECT * FROM Etudiant WHERE nom LIKE :nom ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':nom' => '%' . $nom . '%']);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erreur searchByNom: " . $e->getMessage());
            return [];
        }
    }

    public function countAll() {
        try {
            $sql = "SELECT COUNT(*) as total FROM Etudiant";
            $stmt = $this->pdo->query($sql);
            $result = $stmt->fetch();
            return $result['total'];
        } catch (PDOException $e) {
            error_log("Erreur countAll: " . $e->getMessage());
            return 0;
        }
    }

    public function findByVille($ville) {
        try {
            $sql = "SELECT * FROM Etudiant WHERE ville = :ville ORDER BY id DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':ville' => $ville]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Erreur findByVille: " . $e->getMessage());
            return [];
        }
    }
}
