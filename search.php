<?php
    require('config.php');
    if (isset($_POST['submit_search'])) {
        switch ($_POST['selected']) {
            case 'selected_id':
                $sql = "SELECT * FROM `users` WHERE `id` LIKE ?";
                $query = '%' . $_POST['search_query'] . '%';
                $sql = $pdo->prepare($sql);
                $sql->execute([$query]);
                $result = $sql->fetchAll();
                break;
            case 'selected_name':
                $sql = "SELECT * FROM `users` WHERE `name` LIKE ?";
                $query = '%' . $_POST['search_query'] . '%';
                $sql = $pdo->prepare($sql);
                $sql->execute([$query]);
                $result = $sql->fetchAll();
                break;
            case 'selected_description':
                $sql = "SELECT * FROM `users` WHERE `description` LIKE ?";
                $query = '%' . $_POST['search_query'] . '%';
                $sql = $pdo->prepare($sql);
                $sql->execute([$query]);
                $result = $sql->fetchAll();
                break;
            case 'selected_sum':
                $sql = "SELECT * FROM `users` WHERE `sum` LIKE ?";
                $query = '%' . $_POST['search_query'] . '%';
                $sql = $pdo->prepare($sql);
                $sql->execute([$query]);
                $result = $sql->fetchAll();
                break;               
            default:
                echo "Error";
                break;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.php">На главную</a>
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
    <a href="delete.php?delete=<?= $value['id']; ?>"><img src="https://img.icons8.com/metro/26/000000/delete-sign.png"/></a>
    <a href="edit.php?edit=<?= $value['id']; ?>"><img src="https://img.icons8.com/android/24/000000/pencil.png"/></a>
    </td>
    <?php }; ?>
    </tr>
</table>
</body>
</html>