<?php
header('Content-Type: application/json');
require 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
  $input = json_decode(file_get_contents('php://input'), true);

  $name = isset($input['name']) ? trim($input['name']) : '';
  $email = isset($input['email']) ? trim($input['email']) : '';
  $city = isset($input['city']) ? trim($input['city']) : '';
  $date_created = date('Y-m-d H:i:s');

  if (!$name || !$email || !$city) {
    http_response_code(400);
    echo json_encode(['error' => 'Name, email, and city are required.']);
    exit;
  }

  $sql = 'INSERT INTO users (name, email, city, date_created) VALUES (?, ?, ?, ?)';
  $stmt = $pdo->prepare($sql);

  if ($stmt->execute([$name, $email, $city, $date_created])) {
    http_response_code(201);
    echo json_encode(['message' => 'Data inserted successfully']);
  } else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to insert data']);
  }
} elseif ($method === 'GET') {
  $sql = 'SELECT * FROM users';
  $stmt = $pdo->query($sql);

  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($users !== false) {
    http_response_code(200);
    echo json_encode($users);
  } else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to retrieve data']);
  }
} else {
  http_response_code(405);
  echo json_encode(['error' => 'Method not allowed']);
}
