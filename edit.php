<?php
    require('config.php');
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
        <p>Имя:</p>
        <input type="text" value='<?=$_GET['name']?>' name="new_name" pattern='[A-Za-zА-Яа-яЁё]+$'>
        <p>Описание:</p>
        <input type="text" value='<?=$_GET['description']?>' name="new_description" pattern='[A-Za-zА-Яа-яЁё]+$'>
        <p>Сумма:</p>
        <input type="number" value='<?=$_GET['sum']?>' name="new_sum">
        <input type="submit" name="submit_update">
    </form>
</body>
</html>