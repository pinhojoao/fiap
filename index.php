<?php

require_once('config/bootstrap.php');

include_once('menu.php');

$sql = "SELECT * FROM posts WHERE category_id = :category ORDER BY created_at DESC LIMIT 10";
$stmt = $conn->prepare($sql);
$category = isset($_REQUEST['categoria']) ? $_REQUEST['categoria'] : 1;
$stmt->bindParam('category', $category);
$stmt->execute();
$results = $stmt->fetchAll();

?>
<table>
    <?php foreach($results as $r) {?>
        <tr>
            <td>
                <img src="<?php echo $r['image']?>">
            </td>
            <td>
                <?php echo $r['title'] ?><br>
                <?php echo substr($r['content'], 0, 100) ?> ...
                <a href="item.php?id=<?php echo $r['id']?>">Leia mais</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php require_once('rodape.php') ?>