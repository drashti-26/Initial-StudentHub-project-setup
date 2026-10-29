<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'db.php';
try { $events=$pdo->query('SELECT id,title,event_date,description FROM events ORDER BY event_date')->fetchAll(); echo json_encode(['success'=>true,'data'=>$events],JSON_UNESCAPED_UNICODE); }
catch(Throwable $e){ http_response_code(500); echo json_encode(['success'=>false,'message'=>'Could not load events.']); }
?>
