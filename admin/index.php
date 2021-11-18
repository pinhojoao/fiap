<?php

require_once('../config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT p.id as post_id, p.title, c.name as category_name FROM posts p
        LEFT JOIN categories c ON c.id = p.category_id
        ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

?>
<table class="container">
    <thead>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($results as $r) {?>
            <tr>
                <td><?php echo $r['post_id'] ?></td>
                <td><?php echo $r['title'] ?></td>
                <td><?php echo $r['category_name'] ?></td>
                <td>
                    <a href="atualizar.php?id=<?php echo $r['post_id']?>"><i class="material-icons">edit</i></a>
                    <a href="excluir.php?id=<?php echo $r['post_id']?>"><i class="material-icons">delete</i></a>
                </td>
                <td></td>
            </tr>
        <?php } ?>
    </tbody>
</table>