<?php
header('Content-Type: application/json; charset=utf-8');

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

$missions = [
    [
        'name' => 'Curiosity',
        'url'  => 'missions/curiosity.php?id=curiosity'
    ],
    [
        'name' => 'Mars Reconnaissance Orbiter',
        'url'  => 'missions/mro.php?id=mro'
    ],
    [
        'name' => 'Schiaparelli EDM Lander',
        'url'  => 'missions/schiaparelli.php?id=schiaparelli'
    ],
];

if ($q === '') {
    echo json_encode([]);
    exit;
}

$result = [];

foreach ($missions as $mission) {
    if (stripos($mission['name'], $q) !== false) {
        $result[] = $mission;
    }
}

echo json_encode($result);