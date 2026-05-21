<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
    exit();
}

$nom = isset($_GET['nom']) ? trim($_GET['nom']) : '';

require_once '../service/EtudiantService.php';
$service = new EtudiantService();

if (empty($nom)) {
    echo json_encode($service->findAllApi());
} else {
    echo json_encode($service->searchByNom($nom));
}
