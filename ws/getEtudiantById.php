<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'ID requis']);
    exit();
}

require_once '../service/EtudiantService.php';

$service = new EtudiantService();
$etudiant = $service->findById($id);

if ($etudiant) {
    echo json_encode($etudiant->toArray());
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Étudiant non trouvé']);
}
