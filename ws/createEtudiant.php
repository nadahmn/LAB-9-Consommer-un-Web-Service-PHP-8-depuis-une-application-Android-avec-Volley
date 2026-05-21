<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
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
    $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $ville = isset($_POST['ville']) ? trim($_POST['ville']) : '';
    $sexe = isset($_POST['sexe']) ? trim($_POST['sexe']) : '';

    $errors = [];
    if (empty($nom)) $errors[] = "Le nom est requis";
    if (empty($prenom)) $errors[] = "Le prénom est requis";
    if (empty($ville)) $errors[] = "La ville est requise";
    if (empty($sexe)) $errors[] = "Le sexe est requis";

    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode([
            'error' => true,
            'message' => 'Données invalides',
            'details' => $errors
        ]);
        exit();
    }

    $etudiant = new Etudiant();
    $etudiant->setNom($nom)
             ->setPrenom($prenom)
             ->setVille($ville)
             ->setSexe($sexe);

    $service = new EtudiantService();
    $id = $service->create($etudiant);

    if ($id) {
        http_response_code(201);
        echo json_encode([
            'success' => true,
            'message' => 'Étudiant ajouté avec succès',
            'id' => $id,
            'data' => $service->findAllApi()
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'error' => true,
            'message' => 'Erreur lors de l\'insertion'
        ]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => 'Erreur serveur: ' . $e->getMessage()
    ]);
}
