<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'error' => true,
        'message' => 'Méthode non autorisée. Utilisez POST.'
    ]);
    exit();
}

require_once '../service/EtudiantService.php';

try {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $ville = isset($_POST['ville']) ? trim($_POST['ville']) : '';
    $sexe = isset($_POST['sexe']) ? trim($_POST['sexe']) : '';

    if ($id <= 0) {
        throw new Exception("ID invalide");
    }
    if (empty($nom) || empty($prenom) || empty($ville) || empty($sexe)) {
        throw new Exception("Tous les champs sont requis");
    }

    $service = new EtudiantService();
    $etudiantExistant = $service->findById($id);

    if (!$etudiantExistant) {
        http_response_code(404);
        echo json_encode([
            'error' => true,
            'message' => 'Étudiant non trouvé'
        ]);
        exit();
    }

    $etudiant = new Etudiant();
    $etudiant->setId($id)
             ->setNom($nom)
             ->setPrenom($prenom)
             ->setVille($ville)
             ->setSexe($sexe);

    if ($service->update($etudiant)) {
        echo json_encode([
            'success' => true,
            'message' => 'Étudiant modifié avec succès',
            'data' => $service->findById($id)->toArray()
        ]);
    } else {
        throw new Exception("Erreur lors de la mise à jour");
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage()
    ]);
}
