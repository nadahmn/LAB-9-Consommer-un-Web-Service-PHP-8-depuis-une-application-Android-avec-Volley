<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'error' => true,
        'message' => 'Méthode non autorisée. Utilisez GET.'
    ]);
    exit();
}

try {
    require_once '../service/EtudiantService.php';

    $service = new EtudiantService();
    $etudiants = $service->findAllApi();

    echo json_encode($etudiants);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => 'Erreur serveur: ' . $e->getMessage()
    ]);
}
