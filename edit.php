<?php
    require('config.php');
    $sql = "SELECT * FROM `users` WHERE `id` = ?";
    $sql = $pdo->prepare($sql);
    $sql->execute([$_GET['edit']]);
    $result = $sql->fetchAll();
    if (isset($_POST["submit_update"])) {
        $sql = "UPDATE `users` SET `name`= ?,`description`= ?,`sum`= ? WHERE `id` = ? ";
        $sql = $pdo->prepare($sql);
        $sql -> execute([$_POST['new_name'],$_POST['new_description'],$_POST['new_sum'],$_GET['edit']]);
        header('Location: index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
</head>
<body>
    <form action="#" method="post">
    <?php foreach ($result as $value) { ?>
        <p>Имя:</p>
        <input type="text" value='<?=$value['name']?>' name="new_name">
        <p>Описание:</p>
        <input type="text" value='<?=$value['description']?>' name="new_description">
        <p>Сумма:</p>
        <input type="text" value='<?=$value['sum']?>' name="new_sum">
        <input type="submit" name="submit_update">
    <?php } ?>
    </form>
</body>
</html>