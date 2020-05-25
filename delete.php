<?php
    require('config.php');

    $id = $_GET['delete'];
    if (isset($_POST['submit_delete'])) {
        $sql = "DELETE FROM `users` WHERE `id`=?";
        $query = $pdo->prepare($sql);
        $query->execute([$id]);
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удалить?</title>
</head>
<body>
    <form action="#" method="POST">
        <p>Вы действительно хотите удалить <?=$_GET['name'];?>?</p>
        <input type="submit" value="Удалить" name="submit_delete">
    </form>
</body>
</html>