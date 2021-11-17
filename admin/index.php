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
<table>
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
                <td><a href="/admin/atualizar.php?id=<?php echo $r['post_id']?>">Editar</a></td>
                <td><a href="/admin/excluir.php?id=<?php echo $r['post_id']?>">Excluir</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require_once('../rodape.php') ?>