<?php

try {
  $pdo = new PDO('mysql:dbname=Database; host=localhost', 'root', 'root');
} catch (PDOException $e) {
  die($e->getMessage());
}?>