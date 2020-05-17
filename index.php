<?php require('config.php'); 

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Описание</th>
        <th>Сумма</th>
    </tr>
    <?php foreach ($result as $value) { ?>
    <tr>
    <td><?=$value['id'] ?></td>
    <td><?=$value['name'] ?></td>
    <td><?=$value['description'] ?></td>
    <td><?=$value['sum'] ?></td>
    <td>
    <a href="?delete=<?= $value['id']; ?>"><img src="https://img.icons8.com/metro/26/000000/delete-sign.png"/></a>
    <a href="some.php?edit=<?= $value['id']; ?>"><img src="https://img.icons8.com/android/24/000000/pencil.png"/></a>
    </td>
    <? } ?>
    </tr>
</table>    
      <form action="func.php" method="GET">
        <p>Имя:</p>
        <input type="text" name="name">
        <p>Описание:</p>
        <input type="text" name="description">
        <p>Сумма заказа:</p>
        <input type="text" name="sum">
        <input type="submit" name="submit_add">
      </form>
</body>
</html>