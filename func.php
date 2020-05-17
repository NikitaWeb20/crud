<?php

require('config.php');

if (isset($_GET["submit_add"])) {
    $sql = "INSERT INTO `users` (`name`, `description`, `sum`) VALUES (?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$_GET['name'], $_GET['description'], $_GET['sum']]);
    header('Location: index.php');
}
else {
    die("Error");
}

?>