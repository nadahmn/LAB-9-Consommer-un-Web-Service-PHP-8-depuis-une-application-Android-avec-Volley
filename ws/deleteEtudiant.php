<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE, POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$id = null;

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
}

if (!$id) {
    http_response_code(400);
    echo json_encode([
        'error' => true,
        'message' => 'ID requis'
    ]);
    exit();
}

try {
    require_once '../service/EtudiantService.php';

    $service = new EtudiantService();
    $etudiant = $service->findById($id);

    if (!$etudiant) {
        http_response_code(404);
        echo json_encode([
            'error' => true,
            'message' => 'Étudiant non trouvé'
        ]);
        exit();
    }

    if ($service->delete($etudiant)) {
        echo json_encode([
            'success' => true,
            'message' => 'Étudiant supprimé avec succès'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'error' => true,
            'message' => 'Erreur lors de la suppression'
        ]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => 'Erreur serveur: ' . $e->getMessage()
    ]);
}
